<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="content-header">
	<h1>
		Pesanan
		<small>Daftar Lengkap</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i> Dashboard
			</a>
		</li>
		<li class="active">Pesanan</li>
	</ol>
</section>

<section class="content">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title with-border">Tabel Pesanan</h3>
				</div>
				<div class="box-body">
					<p id="showSpinner" class="text-center">
						<i class="fa fa-spinner fa-spin fa-5x"></i>
					</p>

					<?php if (count($query) == 0) {; ?>

					<div class="text-center">
						<p><i>-- Tidak ada data --</i></p>
					</div>

					<?php } else { ?>

					<table id="tabelPesanan" class="table table-bordered table-striped text-center" width="100%" cellspacing="0" style="display: none;">
						<thead>
							<tr>
								<th>ID Pesanan</th>
								<th>Nama Lengkap</th>
								<th>Total Biaya</th>
								<th>Tanggal Pemesanan</th>
								<th>Aksi</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($query as $order): ?>
							<tr>
								<td><?php echo $order['id']; ?></td>
								<td><?php echo $order['nama_depan'] .' '. $order['nama_belakang']; ?></td>
								<td>Rp. <?php echo number_format($order['biaya'], '0', ',', '.'); ?></td>
								<td><?php echo date('d F Y, h: mA', strtotime($order['tanggal'])); ?></td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url('order/view/').$order['id']; ?>" target="_blank">
										<i class="fa fa-eye"></i> Lihat
									</a>
								</td>
								<td>
									<?php if ($order['konfirmasi'] == false && $order['dikirim'] == false && $order['diterima'] == false) { ?>
									<a class="btn btn-default" href="<?php echo base_url('admin/confirm_order/').$order['id']; ?>" data-toggle="tooltip" data-placement="top" title="Lakukan konfirmasi?">
										Terdaftar
									</a>
									<?php } ?>

									<?php if ($order['konfirmasi'] == true && $order['dikirim'] == false && $order['diterima'] == false) { ?>
									<a class="btn btn-info" href="<?php echo base_url('admin/send_order/').$order['id']; ?>" data-toggle="tooltip" data-placement="top" title="Kirim pesanan?">
										Dikonfirmasi
									</a>
									<?php } ?>

									<?php if ($order['konfirmasi'] == true && $order['dikirim'] == true && $order['diterima'] == false) { ?>
									<a class="btn btn-primary" href="<?php echo base_url('admin/recieved_order/').$order['id']; ?>" data-toggle="tooltip" data-placement="top" title="Pesanan telah diterima?">
										Dikirim
									</a>
									<?php } ?>

									<?php if ($order['konfirmasi'] == true && $order['dikirim'] == true && $order['diterima'] == true) { ?>
									<a class="btn btn-success" disabled>
										Diterima
									</a>
									<?php } ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		$('#showSpinner').hide();

		$('[data-toggle="tooltip"]').tooltip()

		$('#tabelPesanan').DataTable({
			"responsive": true,

			//Set column definition initialisation properties.
			"columnDefs": [
				{ 
				"targets": [ 4, 5 ], //first column / numbering column
				"orderable": false, //set not orderable
				},
			],
		});

		$('#tabelPesanan').show();
	})
</script>