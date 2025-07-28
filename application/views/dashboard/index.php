<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
</head>
<body>

<?php $this->load->view('partials/header'); ?>

<div class="container">
    <p>Driver ID dari session: <strong><?= $this->session->userdata('driver_id'); ?></strong></p>

    <?php if (empty($orders)): ?>
        <div class="no-order">
            <img src="<?= base_url('assets/img/no-order.jpg') ?>" alt="No Order" class="no-order-img">
            <h3>Tidak Ada Order!</h3>
            <p>Harap tunggu penugasan berikutnya dari kantor</p>
        </div>
    <?php else: ?>
        <div class="order-list">
            <h2>Daftar Order Anda</h2>
            <?php foreach ($orders as $order): ?>
                <div class="order-item">
                    <strong><?= $order->order_code ?></strong>
                    <p>Customer: <?= $order->customer ?></p>
                    <div class="order-item status-<?= $order->status?>">
                        <p style="color: white; font-weight : bold;">Status: <?= ucfirst($order->status) ?></p>
                    </div>
                    <p>Tanggal: <?= date('d M Y', strtotime($order->created_at)) ?></p>
                    <a class="btn-detail" href="<?= site_url('order/detail/' . $order->id) ?>">Detail</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('auth/logout') ?>" class="logout-btn">Logout</a>
</div>

<?php $this->load->view('partials/footer'); ?>
</body>
</html>
