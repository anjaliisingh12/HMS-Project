# 🏥 Hospital Management System (HMS) Project

## 🌐 Live Demo

👉 http://3.17.55.160/

---

## 📌 Overview

The Hospital Management System (HMS) is a web-based application developed using **PHP and MySQL**.  
It allows administrators, doctors, and patients to manage appointments, schedules, and personal information efficiently.

This system simplifies hospital workflow by providing role-based dashboards for Admin, Doctors, and Patients.

---

## 🚀 Features

### 👨‍💼 Admin

- Add, edit, and delete doctors
- Schedule new doctor sessions and remove sessions
- View patient details
- View patient bookings

---

### 👨‍⚕️ Doctors

- View their appointments
- View their scheduled sessions
- View patient details
- Delete account
- Edit account settings

---

### 👩‍⚕️ Patients (Clients)

- Make appointments online
- Create accounts themselves
- View their old bookings
- Delete account
- Edit account settings

---

## 🔐 Demo Dashboards Credentials

### 🛠️ Admins:
- **1000000000** | Password: `123` | Role: `admin`
- **1100000000** | Password: `456` | Role: `super_admin`

### 👨‍⚕️ Doctors:
- **2000000000** | Password: `123`
- **2200000000** | Password: `123`

### 👩‍⚕️ Patients:
- **3000000000** | Password: `123`
- **3300000000** | Password: `123`

---

## 🗄️ Database Schema

The database schema includes the following tables:

- `admin` – Stores admin user information  
- `appointment` – Stores appointment details  
- `doctor` – Stores doctor information  
- `patient` – Stores patient information  
- `schedule` – Stores scheduling information  
- `specialties` – Stores medical specialties  
- `webuser` – Stores general user information  

---

## ⚙️ Installation

1️⃣ Clone the repository to your local machine  
2️⃣ Import the `hospital.sql` file into your MySQL database  
3️⃣ Update the database connection settings in `connection.php`  
4️⃣ Start your web server  
5️⃣ Navigate to:

```
http://localhost/HMS
```

---

## 📖 Usage

1. Log in using the provided credentials.
2. Use the respective dashboards to manage appointments, schedules, and personal information.

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, Bootstrap
- **Backend:** PHP
- **Database:** MySQL
- **Deployment:** AWS EC2 (Public IP: 3.17.55.160)

---

## 👩‍💻 Author

**Anjali Singh**  
Full Stack Developer  

If you like this project, don’t forget to ⭐ the repository!
