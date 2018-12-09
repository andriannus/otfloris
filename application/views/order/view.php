<div class="spacer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 text-center">
				<h1 class="title font-bold">Detail Pesanan</h1>
				<h6 class="subtitle">Berikut Detail Pesanan dengan ID yang dimaksud</h6>
			</div>
		</div>

		<div class="row justify-content-center m-t-40">
			<div class="col-md-9">
				<table class="table table-striped">
					<tr>
						<td>ID Pesanan</td>
						<td><code><?= $query->id; ?></code></td>
					</tr>
					<tr>
						<td>Barang yang dipesan</td>
						<td><?= $query->barang; ?></td>
					</tr>
					<tr>
						<td>Tulisan dikartu ucapan</td>
						<td><?= $query->ucapan; ?></td>
					</tr>
					<tr>
						<td>Nama Pengirim di pesanan</td>
						<?php if($query->pengirim != null) { ?>
							<td><?= $query->pengirim; ?></td>
							
						<?php } else { ?>
							<td><em>Tidak ada data</em></td>
						<?php } ?>
					</tr>
					<tr>
						<td>Total Biaya</td>
						<td>Rp. <?= number_format($query->biaya, '0', ',', '.'); ?></td>
					</tr>
					<tr>
						<td>Tanggal Pesanan</td>
						<td><?= date('d F Y, h: mA', strtotime($query->tanggal)); ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><?= $query->nama_depan.' '.$query->nama_belakang; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?= $query->email; ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td><?= $query->telepon; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?= $query->alamat; ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<?php if ($query->konfirmasi == true) { ?>
							<span class="label label-success">Dikonfirmasi</span>
							<?php } else { ?>
							<span class="label label-danger">Terdaftar</span>
							<?php } ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
