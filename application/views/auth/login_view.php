<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Sopir</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/login_page.css') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
  <div class="login-box">
    <div class="header">
      <h1 class="text-logo">Accelog</h1>
      <h2>Masuk akun Sopir</h2>

      <!-- Menampilkan error flashdata -->
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger" style="color: red; margin-top: 10px;">
          <?= $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>
    </div>

    <form action="<?= site_url('auth/proses_login') ?>" method="post">
      <div class="form-group">
        <input type="text" name="phone" placeholder="Nomor Handphone" required>
      </div>

      <div class="form-group password-group">
        <input type="password" name="password" placeholder="Kata Sandi" required>
        <span class="eye">&#128065;</span>
      </div>

      <button type="submit" class="btn-login">Masuk</button>

      <div class="havent-account">
        <p>Belum punya akun?</p>
        <a href="<?= base_url('auth/register') ?>">Daftar</a>
      </div>
    </form>

    <div class="footer">
      <p>Version 1.9.2</p>
      <p>&copy; 2021 <strong>Accelog</strong></p>
      <a href="#">Terms and Service</a>
    </div>
  </div>
</div>

</body>
</html>
