<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Flat Login Form</title>
   
    <base href="<?= base_url()?>/admin/">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
	<style>
		.form-dangky{display:none}
		
	</style>
	
	<link rel="stylesheet" href="css/login.css">

</head>

<body>

	<div class="container">
		<div class="info">
			<h1>Administration </h1>
		</div>
	</div>
	<div class="form">
		<div class="thumbnail"><img src="images/manager.png" /></div>
			<?php if(session()->getFlashdata('LOI')): ?>
				<?php foreach(session()->getFlashdata('LOI') as $bien): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Thông báo: </strong> <?= $bien?>
						<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php break ?>
				<?php endforeach ?>
			<?php endif ?>
			<?php if(session()->getFlashdata('MESSAGE_ERROR')): ?>
				<?php foreach(session()->getFlashdata('MESSAGE_ERROR') as $bien): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Thông báo: </strong> <?= $bien?>
						<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php break ?>
				<?php endforeach ?>
			<?php endif ?>
			<?php if(session()->getFlashdata('MESSAGE_SUCCESS')): ?>
				<?php foreach(session()->getFlashdata('MESSAGE_SUCCESS') as $bien): ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Thông báo: </strong> <?= $bien?>
						<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php break ?>
				<?php endforeach ?>
			<?php endif ?>
		<div class="form-dangky">
			<form class="register-form" action="create" method="post">
				<input type="text" placeholder="username" name="username" />
				<input type="text" placeholder="email address" name="email" />
				<input type="password" placeholder="password" name="password" />
				<input type="password" placeholder="Confirm password" name="repassword" />
				<input type="submit" value="Đăng ký" />			
			</form>
			<p class="message">Đã có tài khoản <button class="button" onclick="sign_in()">Đăng nhập</button></p>
		</div>
		<span style="color:red;"></span>
		<span style="color:green;"></span>
		<div class="form-dangnhap">
			<form class="login-form" action="login" method="post">
				<input type="text" placeholder="username" name="username" />
				<input type="password" placeholder="password" name="password" />
				<input type="submit" value="Đăng nhập" />
				
			</form>
			<p class="message">Chưa đăng ký? <button class="button" onclick="create_account()">Đăng ký</button>
			</p>
		</div>
	</div>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
	</script>
	<script>
		$( document ).ready(function() {
			<?php if(session()->getFlashdata('MESSAGE_ERROR')):?>
				create_account();
			<?php endif?>
		});
		function create_account(){
			$('.form-dangky').show();//hiển thị
			$('.form-dangnhap').hide();//ẩn đi
		}

		function sign_in(){
			$('.form-dangky').hide();
			$('.form-dangnhap').show();
		}

	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>






</body>

</html>