<!doctype html>
<html lang="en">
  <head>
  	<title>Wallet | Register</title>
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
						<div class="img" style="background-image: url(../assets/images/bg-1.jpg);">
			      </div>
				  <div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Create new account</h3>
			      		</div>
			      	</div>
			      	<?php
			      	include "../../functions/account_auth/configuration.php";
			      	include "../../functions/uuidgen.php";
			      	$ref = guidv4();
			      	if (isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['phone'],$_POST['password'],$_POST['confirmpass'])) {
			      		$fname = stripslashes($_REQUEST['fname']); 
        				$fname = mysqli_real_escape_string($con, $fname);

        				$lname = stripslashes($_REQUEST['lname']); 
        				$lname = mysqli_real_escape_string($con, $lname);

        				$email = stripslashes($_REQUEST['email']); 
        				$email = mysqli_real_escape_string($con, $email);

        				$phone = stripslashes($_REQUEST['phone']); 
        				$phone = mysqli_real_escape_string($con, $phone);

        				$password = stripslashes($_REQUEST['password']); 
        				$password = mysqli_real_escape_string($con, $password);

        				$confirmpass = stripslashes($_REQUEST['confirmpass']); 
        				$confirmpass = mysqli_real_escape_string($con, $confirmpass);

        				$id = time();

        				if ($password === $confirmpass) {
        					$passwordreal = password_hash($password, PASSWORD_DEFAULT);
        					$query = "INSERT INTO `accounts`(`account_id`, `account_ref`, `account_fname`, `account_lname`, `account_password`, `account_email`, `account_phone`, `account_verified_phone`, `account_verified_email`, `balance`, `account_stat`, `account_date_start`) VALUES ('$id','$ref','$fname','$lname','$passwordreal','$email','$phone','0','0','0','0',CURRENT_TIMESTAMP())";
        					$signup = mysqli_query($con, $query);
        					if ($signup) {
					            echo '<script>
					            swal("Account created successfully");
					            setTimeout(function(){window.location = "../login";},1500);
					            </script>';
					        } else {
					            echo '<script>swal("An error occurred");</script>';
					        }
        				}
			      	}
			      	?>
					<form action="" class="signin-form" method="POST">
						<div class="row">
							<div class="col">
								<div class="form-group mb-3">
						      		<label class="label" for="fname">First Name</label>
						      		<input type="text" class="form-control" placeholder="First Name" name="fname" required>
						      	</div>
							</div>
							<div class="col">
								<div class="form-group mb-3">
									<label class="label" for="lname">Last Name</label>
						            <input type="text" class="form-control" placeholder="Last Name"name="lname" required>
						        </div>
							</div>
						</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" class="form-control" placeholder="Email" name="email" required>
			      		</div>
			            <div class="form-group mb-3">
			            	<label class="label" for="phone">Phone</label>
			                <input type="text" class="form-control" placeholder="Phone" name="phone" required>
			            </div>
		            	<div class="row">
							<div class="col">
								<div class="form-group mb-3">
						      		<label class="label" for="name">Password</label>
						      		<input type="password" class="form-control" placeholder="Password" name="password" required>
						      	</div>
							</div>
							<div class="col">
								<div class="form-group mb-3">
						            <label class="label" for="password">Confirm Password</label>
						            <input type="password" class="form-control" placeholder="Password Comfirm" name="confirmpass" required>
						        </div>
							</div>
						</div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Create Account</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50 text-md-right">
							<a href="#">Forgot Password</a>
						</div>
		            </div>
		          </form>
		          <p class="text-center">Already a member? <a href="../login/">Login instead</a></p>
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

