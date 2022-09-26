<?php 
    include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/rectangle.css">
    
    <link rel="stylesheet" href="css/styleicoo.css">
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./css/navstyle.css">
  <link rel="stylesheet" href="./css/footerstyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .input-group input {
    height: 36.5px;
    width: 515px;
  }
  button, input, select, textarea {
    height: 89.5px;
    width: 515px;
  }
  .navbar-brand {
			font-weight: 600;
    		text-transform: uppercase;
		}
  html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, Sans-serif;
      background-color: #1F2739;
  }
  
  .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
    		background-color: #ffeba7;
  			}
  		.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus {
			  background-color: #102770;
			}

      		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
        		color: #102770;
      		}

      .navbar-inverse .navbar-nav>li>a {
    		color: #ffeba7;
			font-size: 13px;
    		font-weight: 600;
    		text-transform: uppercase;
		}
		.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus {
    		/* color: #ffeba7; */
		}

    .navbar-inverse {
    		background-color: #FB667A;
			  border-color: #d15465;
        border: none;
		}
		.navbar-inverse .navbar-nav>li>a {
    		color: #ffeba7;
		}
		.navbar .nav {
    		font-family: 'Fira Sans', sans-serif;
    		text-transform: uppercase;
    		letter-spacing: 1px;
    		font-size: 1.5rem;
		}
		.navbar-inverse .navbar-brand {
    		color: #ffeba7;
		}
		.navbar-brand {
			font-family: 'Fira Sans', sans-serif;
    		float: left;
    		height: 50px;
    		padding: 15px 15px;
    		font-size: 19px;
    		line-height: 20px;
		}
    form, .content {
      height: 645px;
    }
    .btn {
      background-color: #FB667A;
      color: #ffeba7;
  }
  p {
    text-align: center;
    margin: 3px;
  }
  </style>
</head>
<body>


<!-- partial:index.partial.html -->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">Employee managment</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav navbar-right">
    <li class="">
          <?php 
          if ($_SESSION['user']['user_type'] == 'admin')
                {
                  ?>
                  
                  <a href="<?php echo SITEURL; ?>../admin/home.php?">Home</a>
                  
                  <?php
                  
                }
              else
                {
                    if(!$_SESSION['user']['user_type'] == 'admin')
                    ?>
                  
                    <a href="<?php echo SITEURL; ?>../index.php?">Home</a>
                  
                    <?php
                }
            ?>
        </li>
        <li>
          <?php 
                if ($_SESSION['user']['user_type'] == 'admin')
                {
                  ?>
                  
                  <a href="<?php echo SITEURL; ?>../admin/edit_user.php?">Employees</a>
                  
                  <?php
                }
                else
                {
                    if(!$_SESSION['user']['user_type'] == 'admin')
                    ?>
                  
                    <a href="<?php echo SITEURL; ?>../invalid_page.html?">Employees</a>
                  
                    <?php
                }
            ?>
        </li>
        <li>
          <a href="projects/index.php">Projects</a>
        </li>
        <li>
          <a href="projects/manage-category.php">Categories</a>
        </li>
        <li class="active">
          <a href="user_contacts.php">Contact Us</a>
        </li>
        <li>
		      <a href="index.php?logout='1'">Logout</a>
		    </li>

      </ul>
    </nav>
  </div>
</header>

        <div>	
			<br>
			<br>
			<br>
			<br>
		</div>

        <div class="header">
	    </div>

        <center>
		<form id="myForm" class="body">
			<h2 style= color:black><b>Send Email</h2>
            <h4 class="sent-notification"></h4>

            <div class="input-group">
			<label style= color:black>Name</label>
			<input id="name" type="text" placeholder="Name">
            
			<br><br>
            </div>

            <div class="input-group">
			<label style= color:black>Email</label>
			<input id="email" type="text" placeholder="Email">
			<br><br>
            </div>

            <div class="input-group">
			<label style= color:black>Subject</label>
			<input id="subject" type="text" placeholder="Subject"> 
			<br><br>
            </div>
            
            
			<p style= color:black>Message</p>
			<textarea id="body" rows="5" cols="46" placeholder="Message"></textarea>
            <br></br>
            <button type="button" class="btn mt-4" onclick="sendEmail()" value="Send Email">Submit</button>
            

        <br><br>
            
		</form>
        </center>

        <div>	
			<br>
			<br>
		</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script  src="./scriptpass.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>