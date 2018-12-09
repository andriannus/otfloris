<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="content-header">
	<h1>
		Bunga
		<small>Tambah Data</small>
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
					<h3 class="box-title">Data Bunga Baru</h3>
				</div>

				<div class="box-body">
					<?= form_open_multipart('flower/addProcess'); ?>
					<div class="form-group">
						<label>Gambar</label>
						<input class="form-control" type="file" name="picture">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input class="form-control" name="harga">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi"></textarea>
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