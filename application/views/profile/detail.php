<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Driver</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
</head>
<body>

    <div class="profile-card">
      <div>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="profile-image" alt="Foto Driver">
        
        <h2><?= $driver->name ?? 'Tidak diketahui' ?></h2>
        <div class="role">Driver Profesional</div>
        
        <div class="info">
          <p><strong><i class="fas fa-phone"></i> Telepon:</strong> <?= $driver->phone ?></p>
          <p><strong><i class="fas fa-calendar-check"></i> Terdaftar:</strong> <?= $driver->created_at ?></p>
          <p><strong><i class="fas fa-truck"></i> Total Order:</strong> <?= $total_order ?> kali</p>
        </div>
      </div>

      <div class="logout-button">
        <form method="post" action="<?= site_url('auth/logout') ?>">
          <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
      </div>
    </div>
<?php $this->load->view('partials/footer'); ?>
</body>
</html>
