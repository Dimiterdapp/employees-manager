<?php 

include('functions.php')

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Log In / Sign Up</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="css/logstyle.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.card-front, .card-back {
    	width: 100%;
    	height: 149%;
	}
		.full-height {
    	min-height: 50vh;
	}
	</style>
</head>
<body>
<!-- partial:index.partial.html -->

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											
											<h4 class="mb-4 pb-3">Log In</h4>

											<form method="post" action="login.php">
      
	  										<?php echo display_error(); ?>

											<div class="form-group">
												<input type="text" name="username" class="form-style" placeholder="Name" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input id="password-field" type="password" name="password" class="form-style" placeholder="Password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" class="btn mt-4" name="login_btn">Login</button>
											
                            				<p class="mb-0 mt-4 text-center"><a href="contacts.php" class="link">In case of problem visit this link.</a></p>
				      					</div>
			      					</div>
								</form>
			      				</div>

								  
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											
											<h4 class="mb-4 pb-3">Sign Up</h4>

											<form name="myform" method="post" action="login.php" onsubmit="return validateemail();"> 
        									

											<div class="form-group">
												<input type="text" name="username" class="form-style" placeholder="Name" id="logname" autocomplete="off" value="<?php echo $username; ?>">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" id="txtPassword" name="password_1" class="form-style" placeholder="Password" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" id="txtConfirmPassword" name="password_2" class="form-style" placeholder="Confirm password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<div class="form-group mt-2">
												<input type="text" name="email" class="form-style" placeholder="Email" id="logpass" autocomplete="off" value="<?php echo $email; ?>">
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="text" name="address" class="form-style" placeholder="Address" id="logpass" autocomplete="off" value="<?php echo $address; ?>">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											
											<div class="form-group mt-2">
          									<label for="">Gender :</label>
          									<input type="radio" name="gender" value="Male" checked/> Male
          									<input type="radio" name="gender" value="Female"/> Female
          									</div>
											<button type="submit" id="btnSubmit" class="btn mt-4" name="register_btn">Register</button>
											<?php echo display_error(); ?>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
</form>
	</div>
<!-- partial -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#txtPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>

  <script  src="./logscript.js"></script>

</body>
</html>
