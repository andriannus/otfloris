<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html ng-app="">
	<head>
		<title>Login to Administrator</title>
		<link rel="stylesheet" href="<?= base_url('asset/components/bootstrap/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/components/font-awesome/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/css/main.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('asset/css/AdminLTE.min.css'); ?>">

		<script src="<?= base_url('asset/components/jquery/jquery.min.js'); ?>"></script>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition login-page">

		<div class="login-box">
			<div class="login-logo">
				<a href="#">OtGarden</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Login untuk masuk ke halaman Admin</p>

				<?= form_open('auth/loginProcess'); ?>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Username" name="username">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</form>
			</div>
		</div>


		<script src="<?= base_url('asset/components/bootstrap/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>