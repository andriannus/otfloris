<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="search" class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title">Butuh pencarian?</h1>
				<form action="<?= base_url('site/search') ?>" method="get">
					<?php if (isset($message)) { ?>
					<div class="form-group">
						<div class="alert alert-danger"><?= $message; ?></div>
					</div>
					<?php } ?>
					
					<div class="form-group">
						<input
							type="text"
							class="form-control"
							name="q"
							placeholder="Masukkan Nama Produk.."
							required
							<?php
							if ($this->input->get('q')) {
								echo 'value='.$this->input->get('q');
							}
							?>
						/>
					</div>
					<button type="submit" class="btn btn-primary mb-2">Submit</button>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>

<?php if (isset($query)) { ?>
<div id="produk" class="testimonial3 spacer bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h2 class="title">Daftar Karangan Bunga</h2>
				<h6 class="subtitle">Anda dapat klik tombol untuk melihat atau membeli produk dari kami..</h6>
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

		<div class="row justify-content-center">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
<?php } ?>
