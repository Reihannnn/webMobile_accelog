###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.

Struktur Proyek CodeIgniter
===========================

Berikut adalah struktur direktori dari proyek CodeIgniter ini:

.. code-block:: text

    ├── application/
    │   ├── controllers/        # Otak aplikasi: Menerima request, memanggil Model, memuat View.
    │   │   ├── Auth.php        # Mengelola proses autentikasi (Login, Register, Logout).
    │   │   ├── Dashboard.php   # Menampilkan ringkasan utama setelah login.
    │   │   ├── History.php     # Mengelola riwayat aktivitas.
    │   │   ├── Order.php       # Mengelola data dan proses pesanan.
    │   │   ├── Profil.php      # Mengelola data dan pengaturan profil pengguna.
    │   │   ├── Ujp.php         # Mengelola modul 'UJP' (fungsi spesifik proyek).
    │   │   └── Welcome.php     # Controller default CodeIgniter.
    │   │
    │   ├── models/             # Data & Logika Database: Berinteraksi dengan database.
    │   │   ├── History_model.php  # Model untuk data riwayat.
    │   │   ├── Order_model.php    # Model untuk data pesanan.
    │   │   └── User_model.php     # Model untuk data pengguna (termasuk autentikasi).
    │   │
    │   └── views/              # Tampilan UI: Menampilkan data kepada pengguna.
    │       ├── auth/           # Views terkait autentikasi.
    │       │   ├── login_view.php
    │       │   └── register_view.php
    │       ├── dashboard/      # Views untuk halaman dashboard.
    │       │   └── index.php
    │       ├── history/        # Views untuk halaman riwayat.
    │       │   └── index.php
    │       ├── order/          # Views untuk halaman pesanan.
    │       │   └── detail.php
    │       ├── partials/       # Bagian UI yang digunakan kembali (header, footer).
    │       │   ├── footer.php
    │       │   └── header.php
    │       ├── profile/        # Views untuk halaman profil.
    │       │   └── detail.php
    │       └── ujp/            # Views untuk modul 'UJP'.
    │           └── index.php
    │
    ├── public/                 # Root publik server web (akses langsung melalui browser)
    │   └── assets/             # File statis: CSS, JavaScript, gambar, dll.
    │
    └── system/                 # Core framework CodeIgniter (tidak boleh diubah)



Daftar Route Aplikasi
=====================

Berikut adalah daftar endpoint (route) utama yang tersedia dalam aplikasi ini:

📂 **Halaman Utama**
---------------------

- **Dashboard**  
  Menampilkan ringkasan utama setelah pengguna login.  
  URL: ``http://localhost/seleksi_magang/dashboard``

- **Detail Order**  
  Menampilkan detail spesifik dari suatu pesanan berdasarkan ID.  
  Contoh: ``http://localhost/seleksi_magang/order/detail/3``

- **UJP (Uang Jalan & Perjalanan)**  
  Menampilkan data UJP sesuai modul proyek.  
  URL: ``http://localhost/seleksi_magang/ujp``

- **Riwayat Aktivitas**  
  Menampilkan riwayat aktivitas atau transaksi pengguna.  
  URL: ``http://localhost/seleksi_magang/history``

- **Profil Pengguna**  
  Menampilkan detail informasi profil pengguna berdasarkan ID.  
  Contoh: ``http://localhost/seleksi_magang/profil/detail/1``

🔐 **Autentikasi**
------------------

- **Login**  
  Halaman untuk masuk ke dalam sistem.  
  URL: ``http://localhost/seleksi_magang/auth/login``

- **Register**  
  Halaman untuk registrasi akun baru.  
  URL: ``http://localhost/seleksi_magang/auth/register``

Catatan: Pastikan server lokal Anda berjalan dan CodeIgniter terkonfigurasi dengan benar di folder `seleksi_magang`.

