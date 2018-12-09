<div class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title font-bold">Konfirmasi Pesanan</h1>
				<h6 class="subtitle">Silahkan isi form dibawah ini</h6>
			</div>
		</div>

		<div class="row justify-content-center m-t-40">
			<div class="col-md-7">
				<?php if ($this->session->flashdata('error404') != null) { ?>
				<div class="form-group">
					<div class="alert alert-danger"><?= $this->session->flashdata('error404') ?></div>
				</div>
				<?php } ?>

				<?php if ($this->session->flashdata('success') != null) { ?>
				<div class="form-group">
					<div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
				</div>
				<?php } ?>
				

				<?= form_open_multipart('order/confirmProcess'); ?>
				<div class="form-group">
					<label>ID Pesanan</label>
					<input type="text" class="form-control" name="id" placeholder="Masukkan ID Pesanan" required>
				</div>
				<div class="form-group">
					<label>Tanggal Pembayaran</label>
					<input type="date" class="form-control" name="tanggal" placeholder="dd/mm/yyyy" required>
				</div>
				<div class="form-group">
					<label>Foto Bukti Transfer</label>
					<input type="file" class="form-control" name="gambar" required>
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-primary">Konfirmasi</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>