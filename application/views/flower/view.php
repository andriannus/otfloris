<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title font-bold"><?= $query->nama; ?></h1>
				<h6 class="subtitle">Apakah Anda tertarik?</h6>
			</div>
		</div>

		<div class="row justify-content-center m-t-40">
			<div class="col-md-7">
				<div class="panel panel-success">
					<div class="form-group">
						<img class="img-thumbnail" src="<?= base_url('asset/pictures/upload/flower/'.$query->gambar); ?>" width="300px">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<p class="font-bold text-success">
							Rp. <?= number_format($query->harga, '0', ',', '.'); ?>
						</p>
					</div>

					<div class="form-group">
						<label>Deskripsi Produk</label>
						<p><?= $query->deskripsi; ?></p>
					</div>

					<div class="form-group">
						<?php
							$id = $query->id;
							$qty = 1;
							$price = $query->harga;
							$name = $query->nama;
							$pict = $query->gambar;

							echo form_open('cart/add');
							echo form_hidden('id', $id);
							echo form_hidden('qty', $qty);
							echo form_hidden('price', $price);
							echo form_hidden('name', $name);
							echo form_hidden('pict', $pict);
						?>
						<button type="submit" class="btn btn-lg btn-success">
							<i class="fa fa-shopping-cart"></i>&nbsp; Masukkan ke Keranjang
						</button>

						<?= form_close(); ?>
					</div>
				</div>

				
			</div>
		</div>
	</div>
</div>
