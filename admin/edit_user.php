<?php include('../functions.php'); ?>
<?php
 
?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$username = $_GET['username'];
		$email = $_GET['email'];
		$address = $_GET['address'];
		$user_type = $_GET['user_type'];
		$gender = $_GET['gender'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if (@empty($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['username'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>

<script>
function validateForm() {
  var x = document.forms["myForm"]["username"].value;
  if (x == "") {
    alert("A new username must be entered !");
    return false;
  }
}
</script>

	<title>Edit Employee</title>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery code to show the working of this method -->
    <script>
        $(document).ready(function() {
            $("#scrolldown").click(function() {
                $(document).scrollTop($(document).height());
            });
        });
    </script>

	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./css/navstyle.css">
	<link rel="stylesheet" href="./css/tabstylee.css">
    <link rel="stylesheet" href="css/upduser.css">
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
    <link rel="stylesheet" href="../css/styleicoo.css">
	<style>
		html, body {
			background-color: #1F2739;
		}
		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
    		background-color: #041e42d9;
  		}
  		.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus {
			background-color: #102770;
		}

		.container{
			padding:0;
		}
		form, .content {
    		width: 80%;
			text-align: center;
		}
		#user_type {
    		height: 36.5px;
    		width: 515px;
    		padding: 5px 10px;
    		background: white;
    		font-size: 16px;
    		border-radius: 5px;
    		border: 1px solid gray;
			color: black;
		}
		#gender {
    		height: 36.5px;
    		width: 515px;
    		padding: 5px 10px;
    		background: white;
    		font-size: 16px;
    		border-radius: 5px;
    		border: 1px solid gray;
			color: black;
		}
		.input-group input {
			height: 36.5px;
			width: 515px;
		}
		#username {
    		color: black;
		}
		#email {
    		color: black;
		}
		#address {
    		color: black;
		}
		table {
    		display: table;
    		border-collapse: separate;
    		box-sizing: border-box;
    		text-indent: initial;
    		border-spacing: 1px;
    		border-color: #1f2029;
		}
		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
    		color: #102770;
			font-size: 13px;
    		font-weight: 600;
    		text-transform: uppercase;
		}

		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
    		background-color: #ffeba7;
		}

		form, .content {
			border-color: #1f2029;
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
    		letter-spacing: 5.5px;
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
		#scrolldown {
            background-image: url(
            'https://cdn-icons-png.flaticon.com/512/6364/6364328.png');
            background-size: cover;
            width: 80px;
            height: 80px;
            border:none;
            background-color: #1f2739;
			margin-top: -75px;
			margin-left: 321.5%;"
        }
		#scrollup {
            background-image: url(
            'https://cdn-icons-png.flaticon.com/512/6941/6941680.png');
            background-size: cover;
            width: 84px;
            height: 84px;
            border:none;
            background-color: #ffeba7;
			margin-left: 161.8%;
        }
		.msgg {
    		margin: 10px auto;
    		padding: 15px;
    		border-radius: 20px;
    		color: #ffeba7;
    		background: #ffeba7;
    		border: 1px solid rgb(224, 220, 0);
    		width: 15%;
    		text-align: center;
		}
		.container td:first-child {
    		padding-bottom: 2%;
    		padding-top: 2%;
    		padding-left: 0.5%;
		}
		.#usertp{
			color: #1f75fe;
		}
		.container td, .container th {
    		padding-bottom: 2%;
    		padding-top: 2%;
    		padding-left: 0.5%;
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
		.navbar-brand {
			font-weight: 600;
    		text-transform: uppercase;
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
		<li>
          <a href="home.php">Home</a>
        </li>
		<li class="active">
		<a href="edit_user.php">Employees</a>
        </li>
        <li>
		  <a href="../projects/index.php">Projects</a>
        </li>
		<li>
          <a href="../projects/manage-category.php">Categories</a>
        </li>
        <li>
		<a href="../user_contacts.php">Contact Us</a>
        </li>
		<li>
		<a href="home.php?logout='1'">Logout</a>
		</li>
      </ul>
    </nav>
  </div>
</header>

       <div class="body">
		   <br/>
		   <br/>
		   <br/>
		   <br/>
		   <!-- <button id="scrolldown" style="margin-left: 91.5%;"></button> -->
		   
       </div>
	  

		<div class="wrapper" style="text-align: center">
		
		<a class="btn mt-4" href="<?php echo SITEURL; ?>../admin/create_user.php">Add User</button></a>
        <h5 class="msgg" style="color:#000000;"><b>Employees <button id="scrolldown"></h5>
		</div>
		
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
<table class="container">
	<thead>
		<tr>
			<!-- <th>ID </th> -->
			<th>Name</th>
			<th>User Type</th>
			<th>Email</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Edit</th>
			<th colspan="2">Delete</th>	
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tbody>
		<tr>
			<!-- <td><?php echo $row['id']; ?></td> -->
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['user_type']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td>
			<a href="edit_user.php?edit=<?php echo $row['id']; ?> & username=<?php echo $row['username']; ?> & email=<?php echo $row['email']; ?> & address=<?php echo $row['address']; ?> & gender=<?php echo $row['gender']; ?> & user_type=<?php echo $row['user_type']; ?>" class="btn mt-4">Edit</a> 

			</td>
			<td>
			<a href="edit_user.php?del=<?php echo $row['id']; ?>" class="btn mt-4">Delete</a>
			</td>
		</tr>
	<?php }?>
	</tbody>
</table>

	<form name="myForm" method="post" action="edit_user.php" onsubmit="return validateForm()">
		<?php echo display_error(); ?>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<br>
		<label><h3 style="color:black"><b>Edit User</h3></label>
		<center>
		<div class="input-group">
			<label style="color:black;">Username:</label>
			<input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
			<label><h6 style="color:#FB667A;">&nbsp;<b>required</h6></label>
		</div>

		<div class="input-group">
			<label style="color:black;">Email:</label>
			<input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
			<label><h6 style="color:#FB667A;">&nbsp;<b>not required</h6></label>
		</div>

		<div class="input-group">
			<label style="color:black;">Address:</label>
			<input type="text" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>">
			<label><h6 style="color:#FB667A;">&nbsp;<b>not required</h6></label>
		</div>
		
		<div class="input-group">
			<label style="color:black;">User type:</label>
			<select name="user_type" id="user_type" value="<?php echo $user_type; ?>">
			<option value="">Select</option>
				<option value="admin"
				<?php 
					if($user_type == 'admin'){
						echo "selected";
					}
				?>
				>admin</option>
				<option value="user"
				<?php 
					if($user_type == 'user'){
						echo "selected";
					}
				?>
				>user</option>
				</select>
				<label><h6 style="color:#FB667A;">&nbsp;<b>not required</h6></label>
		</div>
		
		<div class="input-group">
			<label style="color:black;">Gender type:</label>
			<select name="gender" id="gender" value="<?php echo $gender; ?>">
				<option value="">Select</option>
				<option value="Male"
				<?php 
					if($gender == 'Male'){
						echo "selected";
					}
				?>
				>Male</option>
				<option value="Female"
				<?php 
					if($gender == 'Female'){
						echo "selected";
					}
				?>
				>Female</option>
				</select>

				<label><h6 style="color:#FB667A;">&nbsp;<b>not required</h6></label>
				<button id="scrollup" onclick="topFunction()"></button>
		</div>

		<div class="input-group">
		<?php if ($update == true): ?>
			<button style="background-color: #FB667A; color: #ffeba7; height:49px; width:145px;" type="submit" class="btn mt-4" name="update"> Update</button>
			<?php else: ?>
			
			<?php endif ?>
		</div>
		</center>
		
		<div>
		<br/>
		<br/>
		</div>
	</form>

	<script  src="./tabscript.js"></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script  src="../scriptpass.js"></script>

	<script>
	let mybutton = document.getElementById("scrollup");
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
  		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
	}
	</script>
</body>
</html>