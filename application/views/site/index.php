<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title font-bold">Selamat Datang di OT Floris</h1>
				<h6 class="subtitle">Berikan Dia bunga yang spesial...</h6>
			</div>
		</div>
	</div>
</div>

<div class="testimonial3 spacer bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h2 class="title">Silahkan lihat produk kami</h2>
				<h6 class="subtitle">Berikut adalah beberapa produk dari kami..</h6>
			</div>
		</div>
		<!-- Row  -->
		<div class="row testi3 m-t-40">
			<?php foreach($query as $bunga) { ?>
			<!-- item -->
			<div class="col-lg-3 col-md-3">
				<div class="card card-shadow">
					<img src="<?= base_url('asset/pictures/upload/flower/'.$bunga['gambar']); ?>" class="card-img-top">
					<div class="card-body text-center">
						<h6 class="m-b-0 customer"><?= $bunga['nama']; ?></h6>
						<a href="<?= base_url('flower/view/'.$bunga['id']) ?>" class="btn btn btn-outline-primary">Lihat</a>
					</div>
				</div>
			</div>
			<!-- item -->
			<?php } ?>
		</div>

		<?php if (count($query) > 4) { ?>
		<div class="row justify-content-center">
			<a class="btn btn-outline-primary" href="<?= base_url('site/flower#produk'); ?>">Lihat Semua</a>
		</div>
		<?php } ?>
	</div>
</div>
