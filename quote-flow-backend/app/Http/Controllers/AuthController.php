<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function signup(Request $request)
    {
        try {
            // Check if email already exists
            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json([
                    'error' => 'Email already exists. Please use a different email address.'
                ], 409);
            }

            $user = User::create([
                'name' => $request->firstName . ' ' . $request->lastName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone' => $request->phone,
                'website' => $request->website,
                'business_name' =>
                    $request->businessName ??
                    $request->companyName ??
                    $request->venueName ??
                    $request->agencyName,
                'street' =>
                    $request->businessStreet ??
                    $request->companyStreet ??
                    $request->venueStreet ??
                    $request->agencyStreet,
                'city' =>
                    $request->businessCity ??
                    $request->companyCity ??
                    $request->venueCity ??
                    $request->agencyCity,
                'state' =>
                    $request->businessState ??
                    $request->companyState ??
                    $request->venueState ??
                    $request->agencyState,
                'zip' =>
                    $request->businessZip ??
                    $request->companyZip ??
                    $request->venueZip ??
                    $request->agencyZip,
                'license_number' => $request->licenseNumber,
                'max_capacity' => $request->maxCapacity,
                'years_experience' => $request->yearsExperience,
                'referral_source' => $request->referralSource,
            ]);

            return response()->json([
                'message' => 'Signup successful',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'role' => $user->role
        ]);
    }
}