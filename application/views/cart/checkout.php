<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title font-bold">Checkout</h1>
				<h6 class="subtitle">Lengkapi form dibawah ini</h6>
			</div>
		</div>

		<div class="row m-t-40">
			<div class="col-md-8">
				<p class="font-bold text-success">Informasi Pesanan</p>

				<?= form_open('order/add'); ?>
				<div class="row">
					<?= form_hidden('biaya', $this->cart->total()) ?>
					<div class="col-md-12">
						<div class="form-group">
							<label>Tulisan di kartu ucapan</label>
							<textarea class="form-control" rows="5" name="ucapan" placeholder="Contoh: Selamat Wisuda, sayang ku.. // Isikan 'Tidak ada' apabila tidak menggunakan kartu ucapan.." required></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Nama Pengirim</label>
							<input type="text" class="form-control" name="pengirim" placeholder="Nama Pengirim // Isikan 'Tidak ada' apabila tidak menggunakan nama pengirim" required pattern="[A-Za-z].{1,}">
						</div>
					</div>
				</div>

				<hr>
				<p class="font-bold text-success">Informasi Tagihan</p>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Depan</label>
							<input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" required pattern="[A-Za-z].{1,}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Belakang</label>
							<input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" pattern="[A-Za-z].{1,}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>HP/Telepon</label>
							<input type="text" class="form-control" name="telepon" placeholder="Contoh: 08130000000" required pattern="[0-9].{6,}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="Contoh: email@domain.com" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Alamat Lengkap</label>
							<textarea class="form-control" rows="5" name="alamat" placeholder="Alamat lengkap Anda. Dari nama Jalan, Blok, RT/RW, Kelurahan, Kecamatan, Kota, hingga kode pos." required></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-block btn-success">Submit Order</button>
						</div>
					</div>

					<br>
					<?php
						$array_item = [];
						foreach($this->cart->contents() as $q) { 
							$array_item[] = $q['name'].' x'.$q['qty'];
						}
						$barang = implode(",", $array_item);
						echo form_hidden('barang', $barang);
					?>
				</div>
				<?= form_close(); ?>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label class="font-bold">Contoh Gambar</label>
					<img class="img-thumbnail" src="<?= base_url('asset/pictures/dll/contoh.jpg'); ?>" width="100%">
				</div>
				
				<div class="form-group">
					<label class="font-bold">Total Biaya Pembelian</label>
					<p class="text-danger font-bold" style="font-size: 24px;">
						Rp. <?= number_format($this->cart->total(), '0', ',', '.'); ?>
					</p>
				</div>

				<div class="form-group">
					<label class="font-bold">Keterangan</label>
					<ul class="list-group">
						<li class="list-group-item list-group-item-danger">Harga di atas belum termasuk ongkos kirim</li>
						<li class="list-group-item list-group-item-danger">Kami akan segera mengirimkan Total Biaya MELALUI SMS atau WA ke No. Handphone Anda setelah Anda mengirimkan detail informasi tagihan</li>
						<li class="list-group-item list-group-item-danger">Untuk mengirimkan detail informasi tagihan, isi form dan klik tombol Submit Order</li>
						<li class="list-group-item list-group-item-danger">Cek email Anda, untuk melihat pesanan telah dikonfirmasi.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
