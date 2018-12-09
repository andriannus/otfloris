<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="spacer">
	<div class="container">
		<?php if ($this->cart->total_items() < 1) { ?>
			<div class="row justify-content-center">
				<div class="col-md-7 text-center">
					<h1 class="title font-bold">
						<i class="fa fa-shopping-basket fa-3x"></i>
					</h1>
					<h6 class="subtitle">
						Keranjang Anda kosong. <br>
						Silahkan Belanja terlebih dahulu..
					</h6>
					<a class="btn btn-outline-success btn-lg" href="<?= base_url('site'); ?>">Lanjutkan Belanja</a>
				</div>
			</div>

		<?php } else {?>
			<div class="row justify-content-center">
				<div class="col-md-7 text-center">
					<h1 class="title font-bold">Keranjang Anda</h1>
					<h6 class="subtitle">Berikut adalah isi dari keranjang Anda</h6>
				</div>
			</div>

			<div class="row justify-content-center m-t-40">
				<div class="col-md-8">
					<table class="table table-bordered text-center">
						<tr class="font-bold success">
							<td colspan="2">Produk</td>
							<td width="20%">Harga Produk</td>
							<td width="20%">Kuantitas</td>
						</tr>
						<?php foreach ($query as $item) { ?>
						<tr>
							<td width="20%">
								<img width="50px" height="auto" src="<?= base_url('asset/pictures/upload/flower/'.$item['pict']); ?>">
							</td>
							<td class="text-left">
								<p><a href="<?= base_url('flower/view/'.$item['id']); ?>"><?= $item['name']; ?></a></p>
								<a class="btn btn-sm btn-danger" href="<?= base_url('cart/remove/'.$item['rowid']); ?>">
									<i class="fa fa-close"></i> Delete
								</a>
							</td>
							<td>
								<p>Rp. <?= number_format($item['price'], '0', ',', '.'); ?></p>
							</td>
							<td>
								<?php
									if ($item['qty'] > 4) {
										/* Hidden Button */

									} else {
									$rowid = $item['rowid'];
									$qty = $item['qty'] + 1;

									echo form_open('cart/update');
									echo form_hidden('rowid', $rowid);
									echo form_hidden('qty', $qty);
								?>
									<button type="submit" class="btn btn-outline-primary">+</button>
								<?php
									echo form_close();
									}
								?>

								<a class="btn btn-default disabled">
									<?php echo $item['qty']; ?>
								</a>
								<?php
									if ($item['qty'] < 2) {
										/* Hidden Button */

									} else {
									$rowid = $item['rowid'];
									$qty = $item['qty'] - 1;

									echo form_open('cart/update');
									echo form_hidden('rowid', $rowid);
									echo form_hidden('qty', $qty);
								?>
									<button type="submit" class="btn btn-outline-primary">-</button>
								<?php
									echo form_close();
									}
								?>
							</td>
						<?php } ?>
					</table>
					<a class="btn btn-success" href="<?php echo base_url('site'); ?>"><i class="fa fa-shopping-cart"></i> Lanjutkan Belanja</a>
				</div>

				<div class="col-md-4">
					<p class="font-bold">Rincian Pesanan</p>
					<table width="100%">
						<tr>
							<td colspan="2">Subtotal</td>
						</tr>
						<?php foreach ($query as $item) { ?>
						<tr>
							<td width="40%"><?= $item['name']; ?></td>
							<td class="text-right" width="60%">Rp. <?= number_format($item['subtotal'], '0', ',', '.'); ?></td>
						</tr>
						<?php } ?>
					</table>
					<hr>
					<table width="100%">
						<tr>
							<td width="40%"><span class="bold">Total</span></td>
							<td class="text-right" width="60%">
								<span class="bold">
									Rp. <?= number_format($this->cart->total(), '0', ',', '.'); ?>
								</span>
							</td>
						</tr>
					</table>
					<hr>
					<a class="btn btn-block btn-lg btn-success text-uppercase" href="<?= base_url('cart/checkout'); ?>">Lanjutkan Pembayaran <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
