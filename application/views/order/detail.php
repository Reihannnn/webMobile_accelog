<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/css/order-detail.css') ?>">
</head>
<body>

<div class="header">
  <h1 class="text-logo">Accelog</h1>
  <div class="identitas">
    <div class="inner-identitas">
      <div>
        <p>Surat Jalan:</p>
        <p class="order_id"><?= $order->order_code ?></p>
      </div>
      <div>
        <p>Pelanggan:</p>
        <p><?= $order->customer ?></p>
      </div>
    </div>
  </div>
</div>

<div class="section alamat">
  <div class="label">Alamat Pengambilan</div>
    <div class="value"><?= $order->pickup_address ?></div>
    <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($order->pickup_address) ?>" target="_blank" class="button map-button"><i class="fa-solid fa-map-location-dot"></i><br>Lihat peta</a>
  
</div>

<div class="section">
    <div class="label">Pickup Time</div>
    <div class="value"><?= date('d M Y', strtotime($order->pickup_date)) ?> - <?= date('H:i', strtotime($order->pickup_time)) ?></div>

    <div class="label">Tanggal-Jam Berangkat</div>
    <div class="value"><?= date('d M Y', strtotime($order->departure_date)) ?> - <?= date('H:i', strtotime($order->departure_time)) ?></div>
</div>

<div class="section">
    <?php switch ($order->status):

        case 'pickup': ?>
            <h3>Pickup Barang</h3>
            <form method="post" action="<?= site_url('order/update_status/' . $order->id . '/berangkat') ?>">
                <div class="label">KM Mobil</div>
                <input class="value" type="number" name="km_mobil" required>
                <button type="submit" class="button">Konfirmasi Berangkat</button>
            </form>
            <?php break;

        case 'berangkat': ?>
            <h3>Perjalanan Dimulai</h3>
            <p>Anda sedang dalam perjalanan menuju lokasi muat.</p>
            <form method="post" action="<?= site_url('order/update_status/' . $order->id . '/tiba_muat') ?>">
                <button type="submit" class="button">Tiba di Lokasi Muat</button>
            </form>
            <?php break;

        case 'tiba_muat': ?>
            <h3>Sudah Tiba di Lokasi Muat</h3>
            <form method="post" action="<?= site_url('order/update_status/' . $order->id . '/muat') ?>">
                <button type="submit" class="button">Mulai Muat</button>
            </form>
            <?php break;

        case 'muat': ?>
            <h3>Proses Muat Barang</h3>
            <form method="post" action="<?= site_url('order/update_status/' . $order->id . '/tiba_tujuan') ?>" enctype="multipart/form-data">
                <div class="label">Total Muat</div>
                <input type="number" name="total_muat" required>

                <div class="label">Foto Mobil</div>
                <input type="file" name="foto_mobil" required>

                <button type="submit" class="button">Selesai Muat</button>
            </form>
            <?php break;

        case 'tiba_tujuan': ?>
            <h3>Tiba di Lokasi Tujuan</h3>
            <form method="post" action="<?= site_url('order/update_status/' . $order->id . '/mulai_bongkar') ?>">
                <button type="submit" class="button">Mulai Bongkar</button>
            </form>
            <?php break;

        case 'mulai_bongkar': ?>
            <h3>Selesai Bongkar</h3>
            <form method="post" action="<?= site_url('order/update_status/' . $order->id . '/selesai') ?>" enctype="multipart/form-data">
                <div class="label">Nomor DO / SPJ</div>
                <input type="text" name="nomor_do" required>

                <div class="label">Upload Surat Jalan</div>
                <input type="file" name="surat_jalan" required>

                <div class="label">Foto Sopir</div>
                <input type="file" name="foto_driver" required>

                <div class="label">Tanda Tangan Driver</div>
                <input type="text" name="ttd_driver" placeholder="Simulasi input ttd">

                <button type="submit" class="button">Konfirmasi Selesai</button>
            </form>
            <?php break;

        case 'selesai': ?>
            <h3>Order Selesai ✅</h3>
            <p>Terima kasih telah menyelesaikan pengantaran ini. Silakan tunggu penugasan selanjutnya.</p>
            <?php break;

        default: ?>
            <p>Status tidak dikenali.</p>
    <?php endswitch; ?>
</div>

<?php $this->load->view('partials/footer'); ?>

</body>
</html>
