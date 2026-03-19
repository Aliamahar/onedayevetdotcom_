<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate required fields
            $validated = $request->validate([
                'event_type' => 'required|string',
                'event_date' => 'required|date',
                'event_state' => 'required|string',
                'is_private_residence' => 'required|boolean',
                'alcohol_served' => 'required|boolean',
                'guest_count' => 'required|integer|min:1',
                'activities' => 'nullable|array',
                'venue_requirements' => 'nullable|array',
                'event_description' => 'required|string',
                'insured_name' => 'required|string',
                'insured_address' => 'required|string',
                'insured_city' => 'required|string',
                'insured_state' => 'required|string',
                'insured_zip' => 'required|string',
            ]);

            $quote = Quote::create([
                'event_type' => $request->event_type,
                'event_date' => $request->event_date,
                'event_state' => $request->event_state,
                'is_private_residence' => $request->is_private_residence,
                'alcohol_served' => $request->alcohol_served,
                'guest_count' => $request->guest_count,
                'activities' => !empty($request->activities) ? json_encode($request->activities) : null,
                'venue_requirements' => !empty($request->venue_requirements) ? json_encode($request->venue_requirements) : null,
                'event_description' => $request->event_description,
                'insured_name' => $request->insured_name,
                'insured_address' => $request->insured_address,
                'insured_city' => $request->insured_city,
                'insured_state' => $request->insured_state,
                'insured_zip' => $request->insured_zip,
            ]);

            return response()->json([
                'message' => 'Quote submitted successfully',
                'data' => $quote
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}