<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<footer>
  
  <!-- Logo / Gambar -->
  <!-- Navigasi Icon -->
  <?php $uri = $this->uri->segment(1); ?>
<div style="display: flex; gap: 30px; justify-content: center; padding: 10px;">
  <a href="<?= site_url('dashboard') ?>" style="text-align: center; color: <?= $uri == 'dashboard' ? '#7e57c2' : '#333'; ?>;">
    <i class="fas fa-home fa-lg"></i><br>
    <small>Dashboard</small>
  </a>
  <a href="<?= site_url('ujp') ?>" style="text-align: center; color: <?= $uri == 'order' ? '#7e57c2' : '#333'; ?>;">
    <i class="fa-solid fa-money-bill"></i><br>
    <small>UJP</small>
  </a>
  <a href="<?= site_url('history') ?>" style="text-align: center; color: <?= $uri == 'history' ? '#7e57c2' : '#333'; ?>;">
    <i class="fa-solid fa-clock-rotate-left"></i><br>
    <small>History</small>
  </a>
  <a href="<?= site_url('profil/detail/' . $this->session->userdata('driver_id')) ?>" style="text-align: center; color: <?= $uri == 'profil' ? '#7e57c2' : '#333'; ?>;">
    <i class="fas fa-user fa-lg"></i><br>
    <small>Profile</small>
  </a>
</div>


</footer>
