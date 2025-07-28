<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar - Accelog</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/register_page.css') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-header">
        <h1 class="text-logo">Accelog</h1>
        <h2>Daftar Akun Sopir</h2>
      </div>
      <form action="<?= base_url('auth/register_action') ?>" method="POST" class="auth-form">
        <div class="form-group">
          <label for="phone">Nomor Handphone</label>
          <input type="text" id="phone" name="phone" placeholder="081234567890" required>
        </div>
        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirm_password">Konfirmasi Kata Sandi</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn">Daftar</button>
        <p class="link">Sudah punya akun? <a href="<?= base_url('auth') ?>">Masuk</a></p>
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
