<?php $this->load->view('partials/header'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/ujp.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<style>
  footer {
	bottom: 0;
	left: 0;
	width: 100%;
	background: #ffffff;
	border-top: 1px solid #ccc;
	display: flex;
	justify-content: space-around;
	align-items: center;
	padding: 10px 0;
	z-index: 99;
	position: fixed; /* atau absolute jika tidak ingin selalu sticky */
}
</style>


<div class="container">
    <h2>Uang Jalan & Perjalanan</h2>

    <?php if (empty($orders)): ?>
        <p>Belum ada trip yang selesai.</p>
    <?php else: ?>
        <table class="ujp-table">
            <thead>
                <tr>
                    <th>Kode Order</th>
                    <th>Customer</th>
                    <th>KM Berangkat</th>
                    <th>Jarak Tempuh</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_semua = 0;
                foreach ($orders as $order):
                    $jarak = $order->km_mobil;
                    $biaya = $jarak * 10000;
                    $total_semua += $biaya;
                ?>
                    <tr>
                        <td><?= $order->order_code ?></td>
                        <td><?= $order->customer ?></td>
                        <td><?= $order->km_mobil ?> km</td>
                        <td><?= $jarak ?> km</td>
                        <td>Rp <?= number_format($biaya, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total Keseluruhan</th>
                    <th>Rp <?= number_format($total_semua, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>
</div>

<?php $this->load->view('partials/footer'); ?>
