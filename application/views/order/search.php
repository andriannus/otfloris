<div class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title font-bold">Cek Status Pesanan</h1>
				<h6 class="subtitle">Masukkan ID Pesanan Anda</h6>
			</div>
		</div>

		<div class="row justify-content-center m-t-40">
			<div class="col-md-7">
				<?= form_open('order/search/result'); ?>
				<div class="form-group">
					<input type="text" class="form-control" name="id" placeholder="Masukkan ID Pesanan">
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-primary">
						<i class="fa fa-search"></i> Cari
					</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>