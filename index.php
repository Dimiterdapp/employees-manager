<?php 
    include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/rectangle.css">
    
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
    <link rel="stylesheet" href="css/styleicoo.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./css/navstyle.css">
  <link rel="stylesheet" href="./css/footerstyle.css">
  <style>
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

  .success {
    	color: #ffeba7;
    	background: #FB667A;
    	border: 1px solid rgb(255, 251, 0);
    	margin-bottom: 20px;
	}
	.error {
    	width: 62%;
    	margin: 0px auto;
    	padding: 10px;
    	border: 1px solid #1f2029;
    	border-radius: 5px;
    	text-align: center;
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
      		height: 299.99px;
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
        <li class="active">
          <a href="index.php">Home</a>
        </li>
        <li>
		      <a href="invalid_page.html">Employees</a>
        </li>
        <li>
          <a href="projects/index.php">Projects</a>
        </li>
        <li>
          <a href="projects/manage-category.php">Categories</a>
        </li>
        <li>
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
			<br>
			<br>
			<br>
	</div>

  <div class="header">
		<h2 style="color:black;">User Account</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div style="height: 190px;" class="profile_info">
			<div>
			<i><b>Welcome:</b> </i>
				<?php  if (isset($_SESSION['user'])) : ?>
					<h4><?php echo $_SESSION['user']['username']; ?>

						<i  style="color: #1f75fe;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<b>
					</h4>
				<?php endif ?>

				Email: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; Address: 
				<?php  if (isset($_SESSION['user'])) : ?>
					<h4><?php echo $_SESSION['user']['email']; ?>
					
						<i>&nbsp;<?php echo ucfirst($_SESSION['user']['address']); ?></i> 
						<br>
					</h4>
				<?php endif ?>

				Gender:
				<?php  if (isset($_SESSION['user'])) : ?>
					<h4><?php echo $_SESSION['user']['gender']; ?> </h4>
				<?php endif ?>
			</div>
		</div>
	</div>
        
		<div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script  src="./scriptpass.js"></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  </body>
</html>