<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="sidebar">

	<!-- Sidebar user panel (optional) -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="<?php echo base_url('asset/pictures/upload/gallery/logo_panasonic.jpg') ?>" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p>Administrator</p>
			<!-- Status -->
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div>

	<!-- Sidebar Menu -->
	<ul class="sidebar-menu" data-widget="tree">
		<li class="header">MENU</li>
		<!-- Optionally, you can add icons to the links -->

		<li class="<?= (isset($menu) && $menu == 'home' ? 'active' : '') ?>">
			<a href="<?php echo base_url('admin/index'); ?>" target="_self">
				<i class="fa fa-home"></i> <span>Beranda</span>
			</a>
		</li>

		<li class="<?= (isset($menu) && $menu == 'flower' ? 'active' : '') ?>">
			<a href="<?php echo base_url('admin/flower'); ?>" target="_self">
				<i class="fa fa-leaf"></i> <span>Bunga</span>
			</a>
		</li>

		<li class="<?= (isset($menu) && $menu == 'order' ? 'active' : '') ?>">
			<a href="<?php echo base_url('admin/order'); ?>" target="_self">
				<i class="fa fa-shopping-bag"></i> <span>Pesanan</span>
			</a>
		</li>

		<li class="<?= (isset($menu) && $menu == 'confirm' ? 'active' : '') ?>">
			<a href="<?php echo base_url('admin/confirm'); ?>" target="_self">
				<i class="fa fa-check"></i> <span>Konfirmasi Pesanan</span>
			</a>
		</li>
	</ul>
	<!-- /.sidebar-menu -->
</section>