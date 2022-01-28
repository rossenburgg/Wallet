<!doctype html>
<html lang="en">
  <head>
  	<title>Wallet | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="../assets/css/style.css">
	<style type="text/css">
		body{
  overflow-y: auto;
  margin: 0px;
  margin-bottom: 0px;
}

body::-webkit-scrollbar {
  width: 5px;
}

body::-webkit-scrollbar-track {
  box-shadow: inset 0 0 1px #fff;
}

body::-webkit-scrollbar-thumb {
  background-color: #e3b04b;
  outline: 1px solid #e3b04b;
  cursor: context-menu;
}

@media screen and (max-width: 800px) {
  body {
    overflow-y: scroll;
    overflow-x: hidden;
  }
  body::-webkit-scrollbar {
    display: none;
  }
}
	</style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-12">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../assets/images/bg-2.jpg);"></div>
							<div class="login-wrap p-4 p-md-5">
						      	<div class="d-flex">
						      		<div class="w-100">
						      			<h3 class="mb-4">Login</h3>
						      		</div>
						      	</div>
						      	<?php
						      	include "../../functions/account_auth/account_auth_proccess.php";
						      	if (isset($_POST['email'],$_POST['password'])) {
							        $email = stripslashes($_REQUEST['email']); 
							        $email = mysqli_real_escape_string($con, $email);

							        $password = stripslashes($_REQUEST['password']);
							        $password = mysqli_real_escape_string($con, $password);

							        $query    = "SELECT * FROM `accounts` WHERE account_email='$email'";
							        $result = mysqli_query($con, $query) or die(mysql_error());
							        $rows = mysqli_num_rows($result);
							        if ($rows == 1) {
							            while($row = mysqli_fetch_assoc($result)) {
							                if (password_verify($password, $row['account_password'])) {
							                	session_regenerate_id();
							                	$_SESSION['wallet_logged_in'] = TRUE;
												$_SESSION['wallet_account_id'] = $row["account_id"];
												$_SESSION['wallet_account_email'] = $email;
												$_SESSION['wallet_account_fname'] = $row["account_fname"];
												if ($row["account_stat"] === 3) {
													echo "<script>swal('Login success');
														setTimeout(function(){window.location = 'blocked';},1500);
														</script>";
												}else{
													if ($row["account_verified_phone"] === 1 || $row["account_verified_email"] ===1) {
														echo "<script>swal('Login success');
														setTimeout(function(){window.location = '../../account/index';},1500);
														</script>";
													}else{
														echo "<script>swal('Login success');
														setTimeout(function(){window.location = 'verify_phone';},1500);
														</script>";
													}
												}
							                }else{
							                	echo "<script>swal('Wrong Password');</script>";
							                }
							            }
							        } else {
							            echo "<script>swal('Login failed');</script>";
							        }
							    }
						      	?>
							<form action="" class="signin-form" method="POST">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" class="form-control" placeholder="Email" name="email" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50 text-md-right">
							<a href="forgot_password">Forgot Password</a>
						</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a href="../register/">Create new account</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/main.js"></script>

	</body>
</html>

