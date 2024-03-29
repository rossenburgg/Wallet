<?php
include "../../functions/account_auth/account_auth_proccess.php";
include '../../functions/handlers/handler_data_protection.php';
if (!isset($_SESSION['wallet_logged_in'])) {
	header("location: login");
	exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Wallet | Verify Phone</title>
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
.img, .login-wrap {
  width: 100%; }
	</style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6">
					<div class="wrap d-md-flex">
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-50">
			      			<h3 class="mb-4">Verify Phone</h3>
			      		</div>
			      	</div>
			      	<?php
			      	if (isset($_POST['verifyotp'])) {
						$otpcode =  $_POST['otp'];
						if ($otpcode!="") {
							verifyotp($otpcode);
						}else{
							echo "<script>swal('Please check the code and try again')</script>";
						}
						
					}
			      	?>
					<form action="" class="signin-form" method="POST">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Please enter the code you received <?=Decrypt($_SESSION['wallet_account_phone']);?></label>
			      			<input type="text" class="form-control" placeholder="OTP" maxlength="6" style="text-align: center;letter-spacing: 7px;" name="otp">
			      		</div>
			      	<?php

			      	if(isset($_POST["requestcode"])){
				        if (isset($_SESSION['wallet_account_phone'])) {
			      			if ($_SESSION['wallet_account_phone']!="") {
			      				$phone = Decrypt($_SESSION['wallet_account_phone']);
			      				phoneotp($phone);
			      				$_POST["requestcode"] = FALSE;
			      			}
			      			$_POST["requestcode"] = FALSE;
			      		}
				    }
			      	
			      	?>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="verifyotp">Verify</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="index">Login instead</a>
									</div>
		            </div>
		          </form>
		          <center><form action="" method="POST">
		          	<button class="btn btn-primary mb-3 w-50" name="requestcode">Request for code</button>
		          </form></center>
		          <p class="text-center">Not a member? <a href="../login/">Login</a></p>
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

