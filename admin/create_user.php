<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
    <link rel="stylesheet" href="css/crform.css">
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/styleico.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
			background-color: #1F2739;
		}
		#user_type {
    		height: 38px;
    		width: 88%;
    		padding: 5px 10px;
    		background: white;
    		font-size: 16px;
    		border-radius: 5px;
    		border: 1px solid gray;
		}
		.input-group input {
    		width: 88%;
			height: 38px;
		}
		.input-group label {
			text-align: left;
		}
		form, .content {
      		height: 854.9px;
    	}
		.error{
			color: #000;
			border: 1px solid #000;
			width: 41%;
			text-align: center;
			font-size: 18.6px;
		}
		.title_paragraph a{
        color: #0c418d;
        text-align: center;
        text-shadow: 0 0 12px rgba(178, 11, 216, 0.79);
        font-family: 'Buda', cursive;
        font-weight: 100;
        font-size: 26px;
        z-index: 0;
        position: relative;
    	}
    #title:link {text-decoration:none;} 
    #title:visited {text-decoration:none;} 
    #title:hover {text-decoration:none;}   
    #title:active {text-decoration:none;}
  </style>
	</style>
</head>
<body>

	<div class="header">
		<h2 style="color:black;">User Info</h2>
		</div>

	<form name="myform" method="post" action="create_user.php" onsubmit="return validateemail();">
	
		<?php echo display_error(); ?>

		<div style="text-align:center;" class="input-group">
			<label style="color:black;">&emsp;&emsp;&nbsp;&nbsp;Name</label>
			<input type="text" name="username" placeholder="Username">
		</div>
		<div style="text-align:center;" class="input-group">
			<label style="color:black;">&emsp;&emsp;&nbsp;&nbsp;User type</label>
			<select name="user_type" id="user_type" >
				<option value="">Select</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div style="text-align:center;" class="input-group">
			<label style="color:black;">&emsp;&emsp;&nbsp;&nbsp;Password</label>
			<input type="password" id="txtPassword" name="password_1" placeholder="Password">
		</div>


		<div style="text-align:center;" class="input-group">
			<label style="color:black;">&emsp;&emsp;&nbsp;&nbsp;Confirm password</label>
			<input type="password" id="txtConfirmPassword" name="password_2" placeholder="Confirm Password">
		</div>


		<div style="text-align:center;" class="input-group">
			<label style="color:black;">&emsp;&emsp;&nbsp;&nbsp;Email</label>
			<input type="text" name="email" placeholder="Email">
		</div>

		<div style="text-align:center;" class="input-group">
			<label style="color:black;">&emsp;&emsp;&nbsp;&nbsp;Address</label>
			<input type="text" name="address" placeholder="Address">
		</div>
	<br/>
		<div style="color:black; text-align:center;">
          <label style="color:black;" for="">Gender : </label>
          <input type="radio" name="gender" value="Male" checked/> Male
          <input type="radio" name="gender" value="Female"/> Female
          </div>

		<div class="input-group">
		<center>
			<button style="background-color: #FB667A; color: #ffeba7; height:49px; width:195px;" type="submit" id="btnSubmit" class="btn mt-4" name="register_btn"> Create</button>
		</center>
		</div>
		<center>
			<p class="title_paragraph"><a id="title" href="home.php">Homepage</a></p>
		</center>
	</form>

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

    
</body>
</html>