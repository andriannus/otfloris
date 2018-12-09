<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="content-header">
	<h1>
		Konfirmasi Pesanan
		<small>Daftar Lengkap</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i> Dashboard
			</a>
		</li>
		<li class="active">Konfirmasi Pesanan</li>
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
								<th>Tanggal</th>
								<th>Foto</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($query as $q): ?>
							<tr>
								<td><?= $q['id_pesanan']; ?></td>
								<td><?= date('d F Y, h: mA', strtotime($q['tanggal'])); ?></td>
								<td><img src="<?= base_url('asset/pictures/upload/confirm/'.$q['foto']); ?>" width="30px" height="auto"></td>
								<td>
									<a class="btn btn-success" href="<?= base_url('order/view/').$q['id_pesanan']; ?>" target="_blank">
										<i class="fa fa-eye"></i> Lihat
									</a>
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

	$('#tabelPesanan').DataTable({
		"responsive": true,

		//Set column definition initialisation properties.
		"columnDefs": [
			{ 
			"targets": [ 2, 3 ], //first column / numbering column
			"orderable": false, //set not orderable
			},
		],
	});

	$('#tabelPesanan').show();
})
</script>
