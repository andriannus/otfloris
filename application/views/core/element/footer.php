<div class="footer4 b-t spacer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 m-b-30">
				<h5 class="m-b-20">Address</h5>
				<p>71 Amsteroum Avenue Cronish Night, NY 35098</p>
			</div>
			<div class="col-lg-3 col-md-6 m-b-30">
				<h5 class="m-b-20">Phone</h5>
				<p>0812 8418 8416 (Lamhot)</p>
			</div>
			<div class="col-lg-3 col-md-6 m-b-30">
				<h5 class="m-b-20">Email</h5>
				<p>lamhotdmin@otfloris.com</p>
			</div>
			<div class="col-lg-3 col-md-6">
				<h5 class="m-b-20">Cari Pesanan</h5>
				<?php echo form_open('order/search_process'); ?>
				<div class="form-group">
					<input type="text" class="form-control" name="id_pesanan" placeholder="Masukkan ID Pesanan">
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-primary">
						<i class="fa fa-search"></i> Cari
					</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="f4-bottom-bar">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex font-14">
						<div class="m-t-10 m-b-10 copyright">Copyright &copy; OtFloris. All Rights Reserved</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
