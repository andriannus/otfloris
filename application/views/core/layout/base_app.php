<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en" ng-app="app">
	<head>
		<title><?= $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?= base_url('asset/flower.png'); ?>" type="image/x-icon">
		<!-- CSS -->
		<link href="<?= base_url('asset/components/bootstrap4/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('asset/components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">

		<link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
		<link rel="stylesheet" href="<?= base_url('asset/css/landing-page.css') ?>">

		<script src="<?= base_url('asset/components/jquery/jquery.min.js'); ?>"></script>
	</head>
	<body>
		<main>
			<?php $this->load->view($navigation); ?>
			
			<div id="content">	
				<?php $this->load->view($page); ?>
			</div>

			<div id="footer">
				<?php $this->load->view('core/element/footer'); ?>
			</div>
		</main>

		<!-- Main Script -->
		<script src="<?= base_url('asset/components/popper/dist/popper.min.js'); ?>"></script>
		<script src="<?= base_url('asset/components/bootstrap4/dist/js/bootstrap.min.js'); ?>"></script>

		<script src="<?= base_url('asset/js/custom.min.js') ?>"></script>
	</body>
</html>
