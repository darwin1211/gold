<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>royalbook</title>
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/login/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url(); ?>assets/login/all.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/login/css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url(); ?>assets/login/style.css" rel="stylesheet">
	<style>	

 
	</style>
	<script type="text/javascript">

	</script>
</head>

<body>
	<div class="login_container bg_login" style="background-image: url(<?php echo base_url(); ?>assets/login/background.jpg)">
		<div class="login_wrapper-bg">
			<div class="lazy-container-login" id="wrapper">
				<div class="rllogin-header"><img src="<?php echo base_url(); ?>assets/login/logo.png" alt="..."></div>
				<form  autocomplete="off" action="<?php echo current_url(); ?>" method="post">
					<div id="login" class="form">
						<div class="login_wrapper">

							<div class="form-group">
								<input type="text" name="login_username" id="login_username" value="" placeholder="Username" required="1" class="form-control user_input">
							</div>
							<div class="form-group">
								<input type="password" name="login_password"  id="login_password" value="" placeholder="Password" required="1" class="form-control pass_input">
							</div>

							<div class="checkboxs">
								<label><input type="checkbox" name="remember" id="remember" checked=""> Remember me</label>
								<!-- <a href="#" class="apk-btn"><img src="<?php echo base_url(); ?>assets/login/android_app_btn.png" alt="..."></a> -->
							</div>

						</div>
						<div class="login_ftrmy">

							<div class="button-groups">

								<button type="submit" class="btn btn-success">Login</button>
							</div>
							<div class="betfairlogo">
								<img src="<?php echo base_url(); ?>assets/login/orbit-betfair.png" alt="...">
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>

	<div class="partner_logo">
		<img src="<?php echo base_url(); ?>assets/login/img-01.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-02.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-03.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-04.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-05.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-06.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-07.png" alt="...">
		<img src="<?php echo base_url(); ?>assets/login/img-08.png" alt="...">
	</div>
	</div>

	<script type="text/javascript">
		document.onkeydown = function(e) {
			//   if(event.keyCode == 123) {
			//       return false;
			//   }
			//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
			//       return false;
			//   }
			//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
			//       return false;
			//   }
			//  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
			//       return false;
			//   }
			//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
			//       return false;
			//   }
		}
	</script>

</body>

</html>