
This project is built using:

* ⚛️ React (Lovable UI)
* 🎨 Tailwind CSS
* ⚡ Vite
* 🐘 Laravel (Backend API)
* 🛢️ MySQL (XAMPP)

---

# 📂 Project Structure

```
Frontend (React)
│── src/
│── public/
│── package.json

Backend (Laravel)
│── app/
│── routes/
│── database/
│── .env
```

---

# ⚙️ Requirements

Make sure you have installed:

* Node.js (>= 18)
* npm 
* PHP (>= 8.1)
* Composer
* XAMPP / MySQL
* Git

---

# 🚀 SETUP GUIDE

---

## 🔹 1. Clone Repository

```bash
git clone https://github.com/Aliamahar/onedayevetdorcom_.git
cd onedayevetdorcom_
```

---

## 🔹 2. Setup Backend (Laravel)

```bash
cd backend   # or your backend folder name
composer install
```

---

### 🔧 Configure Environment

Copy `.env` file:

```bash
cp .env.example .env
```

Edit `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quote_flow
DB_USERNAME=root
DB_PASSWORD=
```

---

### 🔑 Generate Key

```bash
php artisan key:generate
```

---

### 🛢️ Run Migrations

```bash
php artisan migrate
```

---

### ▶️ Start Backend Server

```bash
php artisan serve
```

Backend will run on:

```
http://127.0.0.1:8000
```

---

## 🔹 3. Setup Frontend (React)

Open new terminal:

```bash
cd frontend   # or your frontend folder name
npm install
```

---

### ▶️ Start Frontend

```bash
npm run dev
```

Frontend will run on:

```
http://localhost:8080
```

---

# 🔗 API ENDPOINTS

| Method | Endpoint      | Description   |
| ------ | ------------- | ------------- |
| POST   | `/api/signup` | Register user |
| POST   | `/api/login`  | Login user    |


---

# 🧪 TESTING

You can test APIs using:

* Postman
* Browser DevTools
* Frontend forms
