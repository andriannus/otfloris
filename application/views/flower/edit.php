<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="content-header">
	<h1>
		Bunga
		<small>Ubah Data</small>
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
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Data Bunga</h3>
				</div>

				<div class="box-body">
					<?= form_open_multipart('flower/updateProcess'); ?>
						<?= form_hidden('id', $query->id); ?>
						<div class="form-group">
							<img class="thumbnail" width="100px" src="<?= base_url('asset/pictures/upload/flower/'.$query->gambar); ?>">
						</div>
						<div class="form-group">
							<label>Gambar Baru</label>
							<input class="form-control" type="file" name="picture">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input class="form-control" name="nama" value="<?= $query->nama; ?>">
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input class="form-control" name="harga" value="<?= $query->harga; ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="form-control" name="deskripsi"><?= $query->deskripsi; ?></textarea>
						</div>
				</div>
				<div class="box-footer">
					<a class="btn btn-danger" href="<?= base_url('admin/flower'); ?>">Cancel</a>
					<input class="btn btn-success" type="submit" value="Submit">
				</div>
					<?= form_close(); ?>
			</div>
		</div>
	</div>
</section>