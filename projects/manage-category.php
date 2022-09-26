<?php 

include('../functions.php');

    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location: ../login.php");
    }

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Project Categories</title>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/label.css">
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./css/navstyle.css">
        <link rel="stylesheet" href="./css/footerstyle.css">
        <link rel="stylesheet" href="./css/tablebackg.css">
        <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
        <style>
		    .container{
			    padding:0;
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

        p {
            margin: 0 0 10px;
            text-align: center;
            font-weight: 500;
            font-size: 17px;
            line-height: 2.5;
            color: #FB667A;
        }

  table {
    		display: table;
    		border-collapse: separate;
    		box-sizing: border-box;
    		text-indent: initial;
    		border-spacing: 1px;
    		border-color: #1f2029;
		}
    .navbar-inverse {
    		background-color: #FB667A;
			border-color: #d15465;
      border:none;
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
    .container td, .container th {
    padding-bottom: 2%;
    padding-top: 2%;
    padding-left: 1%;
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
          <a href="index.php">Projects</a>
        </li>
        <li class="active">
          <a href="manage-category.php">Categories</a>
        </li>
        <li>
        <?php 
                if ($_SESSION['user']['user_type'] == 'admin' || $_SESSION['user']['user_type'] == 'user')
                {
                  ?>
                  
                  <a href="<?php echo SITEURL; ?>../user_contacts.php?">Contact Us</a>
                  
                  <?php
                }
        ?>
        </li>
        <li>
            <?php 
                if ($_SESSION['user']['user_type'] == 'admin')
                {
                  ?>
                  
                  <a href="<?php echo SITEURL; ?>../admin/home.php?logout='1'">Logout</a>
                  
                  <?php
                }
                else
                {
                    if(!$_SESSION['user']['user_type'] == 'admin')
                    ?>
                  
                    <a href="<?php echo SITEURL; ?>../index.php?logout='1'">Logout</a>
                  
                    <?php
                }
            ?>
		    </li>
      </ul>
    </nav>
  </div>
</header>

<div class="body">
           <br>
           <br>
           <br>
           <br>
       </div>
        
        <div class="wrapper" style="text-align: center">
        <a class="btn mt-4" href="<?php echo SITEURL; ?>add-category.php">Add Category</a>
        <h5 class="msgg" style="color:#000000;"><b>Categories</h5>
        <p>
            <?php 
            
                //Check if the session is set
                if(isset($_SESSION['add']))
                {
                    //display message
                    echo $_SESSION['add'];
                    //REmove the message after displaying one time
                    unset($_SESSION['add']);
                }
                
                //Check the session for Delete
                
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                //Check Session Message for Update
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                
                //Check for Delete Fail
                if(isset($_SESSION['delete_fail']))
                {
                    echo $_SESSION['delete_fail'];
                    unset($_SESSION['delete_fail']);
                }
            
            ?>
        </p>
        
        
        <!-- Table to display Categories starts here -->
        <div class="all-lists">
            
            <table class="container">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Edit&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Delete</th>
                </tr>
                </thead>
                
                <?php 
                
                    //Connect the DAtabase
                    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                    
                    //Select Database
                    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                    
                    //SQl Query to display all data fromo database
                    $sql = "SELECT * FROM categories";
                    
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);
                    
                    //CHeck whether the query executed executed successfully or not
                    if($res==true)
                    {
                        //work on displaying data
                        //echo "Executed";
                        
                        //Count the rows of data in database
                        $count_rows = mysqli_num_rows($res);
                        
                        //Create a SErial Number Variable
                        $sn = 1;
                        
                        //Check whether there is data in database of not
                        if($count_rows>0)
                        {
                            //There's data in database' Display in table
                            
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Getting the data from database
                                $category_id = $row['category_id'];
                                $category_name = $row['category_name'];
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $category_name; ?></td>
                                    <td>
                                        <a class="btn mt-4" href="<?php echo SITEURL; ?>update-category.php?category_id=<?php echo $category_id; ?>">Update</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;  
                                        <a class="btn mt-4" href="<?php echo SITEURL; ?>delete-category.php?category_id=<?php echo $category_id; ?>">Delete</a>
                                    </td>
                        
                                </tr>
                                
                                <?php
                                
                            }
                            
                            
                        }
                        else
                        {
                            //No Data in Database
                            ?>
                            
                            <tr>
                                <td colspan="3">No Categories Added Yet.</td>
                            </tr>
                            
                            <?php
                        }
                    }
                
                ?>
                
                </tbody>  
            </table>
        </div>
        
        <br>
        </div>

    <script  src="./tabscript.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    </body>
</html>