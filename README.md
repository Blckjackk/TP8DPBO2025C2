# TP8DPBO2025C2

## Janji  
Saya **Ahmad Izzuddin Azzam** dengan NIM **2300492** berjanji mengerjakan TP8 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah dispesifikasikan. Aamiin.

---

# Aplikasi Manajemen Data Akademik  
Aplikasi ini memungkinkan pengguna untuk mengelola data akademik seperti mahasiswa, dosen, mata kuliah, program studi, dan pengambilan mata kuliah. Aplikasi dikembangkan dengan arsitektur **MVC (Model-View-Controller)** menggunakan PHP tanpa framework, yang memisahkan logika bisnis, tampilan, dan kontrol alur aplikasi.

---

## Struktur Direktori

TP_MVC_TEST/
├── controllers/ # Kontroler setiap entitas
│ ├── Courses.controller.php
│ ├── Enrollments.controller.php
│ ├── Lecturers.controller.php
│ ├── ProgramStudi.controller.php
│ └── Students.controller.php
│
├── models/ # Model (logika & koneksi DB)
│ ├── Courses.class.php
│ ├── DB.class.php
│ ├── Enrollments.class.php
│ ├── Lecturers.class.php
│ ├── ProgramStudi.class.php
│ └── Students.class.php
│
├── views/ # Tampilan dan kelas Template
│ ├── Courses.view.php
│ ├── Enrollments.view.php
│ ├── Lecturers.view.php
│ ├── ProgramStudi.view.php
│ ├── Students.view.php
│ ├── Templates.class.php
│ └── index.php
│
├── templates/ # HTML statis UI
│ ├── navbar.html
│ ├── students.html
│ ├── lecturer.html
│ ├── program_studi.html
│ ├── Courses.html
│ └── Enrollments.html
│
├── connection.php # Koneksi DB
├── index.php # Entry point utama
├── bootstrap.min.css # CSS Bootstrap
├── bootstrap.bundle.min.js # JS Bootstrap
├── bootstrap.min.js
├── jquery.min.js
├── popper.min.js

yaml
Copy
Edit

---

## Fitur Aplikasi

### 🟢 Create  
Pengguna dapat menambahkan data baru (mahasiswa, dosen, mata kuliah, dsb) melalui form input.

### 🟡 Read  
Menampilkan daftar data yang ada dalam bentuk tabel/kartu.

### 🔵 Update  
Memungkinkan pengguna untuk mengubah data melalui form edit.

### 🔴 Delete  
Menghapus data dengan tombol hapus dan konfirmasi.

---

## Alur Navigasi

- `index.php` di root akan membaca `?page=...` dari URL.
- Berdasarkan parameter tersebut, akan diarahkan ke controller dan view yang sesuai.
- View akan me-render HTML dari folder `templates/` menggunakan `Templates.class.php`.

---

## Teknologi

- PHP Native + PDO
- Bootstrap untuk styling
- Arsitektur MVC
- HTML statis di-render dinamis

---

## Catatan

- Sesuaikan `connection.php` dengan konfigurasi database lokal Anda.
- Pastikan `Templates.class.php` tidak dihapus, karena penting untuk semua tampilan halaman.

---
