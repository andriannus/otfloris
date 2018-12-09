<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="header1 po-relative">
	<div class="container">
	<!-- Header 1 code -->
		<nav class="navbar navbar-expand-lg h1-nav">
			<a class="navbar-brand" href="<?= base_url('site'); ?>">
				<strong class="text-success">OT Floris</strong>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header1" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="ti-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="header1">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('site');?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('site/flower');?>">List Bunga</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('site/confirm');?>" >Konfirmasi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('order/search');?>">Cek Pesanan</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-outline-primary" href="<?= base_url('cart');?>" role="button">
							<i class="fa fa-shopping-cart"></i>
							<?php
							if ($this->cart->total_items() > 0) {
								echo $this->cart->total_items();
							}
							?>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- End Header 1 code -->
	</div>
</div>