<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="<?= base_url('asset/admin_fav.png'); ?>">

		<title><?= $title; ?></title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="<?= base_url('asset/components/bootstrap/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/components/dataTables/css/dataTables.bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/components/dataTables/responsive/css/responsive.bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/components/dataTables/responsive/css/responsive.dataTables.min.css'); ?>">
		
		<!-- FontAwesome -->
		<link rel="stylesheet" href="<?= base_url('asset/components/font-awesome/css/font-awesome.min.css'); ?>">
		
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url('asset/components/Ionicons/css/ionicons.min.css'); ?>">

		<!-- AdminLTE -->
		<link rel="stylesheet" href="<?= base_url('asset/css/AdminLTE.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/css/skin-green.min.css'); ?>">

		<!-- jQuery -->
		<script src="<?= base_url('asset/components/jquery/jquery.min.js'); ?>"></script>

		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<?php $this->load->view('core/element/navigation/admin'); ?>
			</header>

			<aside class="main-sidebar">
				<?php $this->load->view('core/layout/sidebar/admin'); ?>
			</aside>

			<div class="content-wrapper">
				<?php $this->load->view($page); ?>
			</div>

			<footer class="main-footer">
				<strong>
					Copyright &copy; <?= date('Y') ?>
					<a href="<?= base_url('site'); ?>">Otfloris</a>.
				</strong> All rights reserved.
			</footer>
		</div>

		<!-- Bootstrap -->
		<script src="<?= base_url('asset/components/bootstrap/js/bootstrap.min.js'); ?>"></script>

		<!-- AdminLTE -->
		<script src="<?= base_url('asset/js/adminlte.min.js'); ?>"></script>

		<!-- DataTables -->
		<script src="<?= base_url('asset/components/dataTables/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?= base_url('asset/components/dataTables/js/dataTables.bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('asset/components/dataTables/responsive/js/dataTables.responsive.min.js'); ?>"></script>
		<script src="<?= base_url('asset/components/dataTables/responsive/js/responsive.bootstrap.min.js'); ?>"></script>
	</body>
</html>