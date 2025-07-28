<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/history.css') ?>">
</head>
<body>

<?php $this->load->view('partials/header'); ?>

<div class="container">
    <h2>Riwayat Aktivitas Order</h2>

    <div class="status-legend" style="margin-bottom: 20px;">
        <h4>Keterangan Warna Status:</h4>
        <ul style="list-style: none; padding: 0px;">
            <li style="margin: 5px 0;">
                <span class="legend-box status-pickup"></span> Pickup
            </li>
            <li style="margin: 5px 0;">
                <span class="legend-box status-berangkat"></span> Berangkat
            </li>
            <li style="margin: 5px 0;">
                <span class="legend-box status-tiba_muat"></span> Tiba Muat
            </li>
            <li style="margin: 5px 0;">
                <span class="legend-box status-muat"></span> Muat
            </li>
            <li style="margin: 5px 0;">
                <span class="legend-box status-tiba_tujuan"></span> Tiba Tujuan
            </li>
            <li style="margin: 5px 0;">
                <span class="legend-box status-mulai_bongkar"></span> Mulai Bongkar
            </li>
            <li style="margin: 5px 0;">
                <span class="legend-box status-selesai"></span> Selesai
            </li>
        </ul>
    </div>

    <?php if (empty($logs)): ?>
        <p>Belum ada aktivitas.</p>
    <?php else: ?>
        <?php foreach ($logs as $log): ?>
            <div class="log-entry status-<?= $log->status ?>">
                <h4 style="color: black;"><?= $log->order_code ?> - <?= ucfirst($log->status) ?></h4>
                <p>Pelanggan: <strong><?= $log->customer ?></strong></p>
                <p>Status: <strong style="text-decoration:underline;"><?= ucfirst($log->status) ?></strong></p>
                <p>Waktu: <?= date('d M Y - H:i', strtotime($log->timestamp)) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $this->load->view('partials/footer'); ?>
</body>
</html>
