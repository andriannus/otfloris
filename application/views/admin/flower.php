<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="content-header">
	<h1>
		Bunga
		<small>Daftar Lengkap</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i> Dashboard
			</a>
		</li>
		<li class="active">Bunga</li>
	</ol>
</section>

<section class="content">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box-success">
				<div class="box-header with-border">
					<a class="btn btn-primary" href="<?= base_url('flower/add'); ?>" target="_self">
						Tambah Bunga <i class="fa fa-plus"></i>
					</a>
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

					<table id="tabelTanaman" class="table table-bordered table-striped text-center" width="100%" cellspacing="0" style="display: none;">
						<thead>
							<tr>
								<th>Gambar</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($query as $tanaman): ?>
							<tr>
								<td><img src="<?= base_url('asset/pictures/upload/flower/'.$tanaman['gambar']); ?>" width="30px" height="auto"></td>
								<td><?= $tanaman['nama']; ?></td>
								<td>Rp. <?= number_format($tanaman['harga'], '0', ',', '.'); ?></td>
								<td>
									<a class="btn btn-success" href="<?= base_url('flower/update/').$tanaman['id']; ?>">
										<i class="fa fa-pencil"></i>
									</a>
									<a id="btnDelete" class="btn btn-danger" data="<?= $tanaman['id']; ?>">
										<i class="fa fa-times"></i>
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

	$('#btnDelete').click(function(){
		var slug = $(this).attr('data')
		deletePlant(slug)
	})

	function deletePlant(slug) {
		var result = confirm("Anda yakin ingin menghapus data ini?")
		if (result) {
			$.ajax({
				url: "<?= base_url('plant/delete/')?>" + slug,
				type : "POST",
				dataType: "JSON",
				success: function(data) {
					location.reload();
				},
				error: function(jqXHR, textStatus, orrorThrown) {
					alert('Error hapus data');
				}
			});
		}
	}

	$('#showSpinner').hide();

	$('#tabelTanaman').DataTable({
		"responsive": true,
		"order": [], //Initial no order.

		//Set column definition initialisation properties.
		"columnDefs": [
			{ 
			"targets": [ 0, 3 ], //first column / numbering column
			"orderable": false, //set not orderable
			},
		],
	});

	$('#tabelTanaman').show();
})
</script>