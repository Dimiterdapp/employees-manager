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

<html>

    <head>
        <title>Project Manager</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/label.css">
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./css/navstyle.css">
        <link rel="stylesheet" href="./css/footerstyle.css">
        <link rel="stylesheet" href="./css/tablebackg.css">
        <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
    </head>
    <style>
        body{
            background-color: #1F2739;
        }
        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
    		background-color: #ffeba7;
  		}
  		.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus {
			background-color: #102770;
		}
    .container{
			  padding:0;
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
        .container td:first-child {
    		padding-bottom: 2%;
    		padding-top: 2%;
    		padding-left: 0.5%;
		}
		.container td, .container th {
    		padding-bottom: 2%;
    		padding-top: 2%;
    		padding-left: 0.5%;
		}
        p {
            margin: 0 0 10px;
            text-align: center;
            font-weight: 500;
            font-size: 17px;
            line-height: 2.5;
            color: #FB667A;
        }

        .navbar-inverse .navbar-nav>li>a {
    		color: #ffeba7;
			font-size: 13px;
    		font-weight: 600;
    		text-transform: uppercase;
		}
        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
            color: #102770;
        }
		.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus {
    		/* color: #ffeba7; */
		}
        .navbar-brand {
			font-weight: 600;
    		text-transform: uppercase;
		}
  </style>
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
        <li class="active">
          <a href="index.php">Projects</a>
        </li>
        <li>
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
        <a class="btn mt-4" href="<?php echo SITEURL; ?>add-project.php">Add Project</a>
      </div>

        <div class="wrapper" style="text-align: center">
        <h5 class="msgg" style="color:#000000;"><b>Project categories</h5>
        
    <?php 
        
        //Comment Displaying Categories From Database in ourMenu
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SELECT DATABASE
        $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
        
        //Query to Get the Categories from database
        $sql2 = "SELECT * FROM categories";
        
        //Execute Query
        $res2 = mysqli_query($conn2, $sql2);
        
        //CHeck whether the query executed or not
        if($res2==true)
        {
            //Display the Categories in menu
            while($row2=mysqli_fetch_assoc($res2))
            {
                $category_id = $row2['category_id'];
                $category_name = $row2['category_name'];
                ?>
                
                <a class="btn mt-4" href="<?php echo SITEURL; ?>project-category.php?category_id=<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
                
                <?php
                
            }
        }
        
    ?>
</div>

<!-- Menu Starts Here -->

    <!-- Projects Starts Here -->
    
    <p>
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
            
            if(isset($_SESSION['delete_fail']))
            {
                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            }
        
        ?>
    </p>
    
    <div class="all-tasks">
        
        <table class="container">
        
        <thead>
            <tr>
                <th>ID</th>
                <th>Assigned For</th>
                <th>Project Name</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Deadline</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

            <?php 
            
                //Connect Database
                $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                
                //Select Database
                $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                
                //Create SQL Query to Get DAta from Databse
                $sql = "SELECT * FROM projects INNER JOIN categories ON projects.category_id=categories.category_id";
                
                //Execute Query
                $res = mysqli_query($conn, $sql);
                
                //CHeck whether the query execueted o rnot
                if($res==true)
                {
                    //DIsplay the Projects from DAtabase
                    //Dount the Projects on Database first
                    $count_rows = mysqli_num_rows($res);
                    
                    //Create Serial Number Variable
                    $sn=1;
                    
                    //Check whether there is project on database or not
                    if($count_rows>0)
                    {
                        //Data is in Database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $project_id = $row['project_id'];
                            $employee_name = $row['employee_name'];
                            $project_name = $row['project_name'];
                            $category_name = $row['category_name'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $employee_name; ?></td>
                                <td><?php echo $project_name; ?></td>
                                <td><?php echo $category_name; ?></td>
                                <td><?php echo $priority; ?></td>
                                <td><?php echo $deadline; ?></td>
                                
                                <td>
                                    <a class="btn mt-4" href="<?php echo SITEURL; ?>update-project.php?project_id=<?php echo $project_id; ?>">Update </a>
                                    
                                    

                                </td>
                                <td>
                                <a class="btn mt-4" href="<?php echo SITEURL; ?>delete-project.php?project_id=<?php echo $project_id; ?>">Delete</a>
                                </td>
                            </tr>
                            
                            <?php
                        }
                    }
                    else
                    {
                        //No data in Database
                        ?>
                        
                        <tr>
                            <td colspan="5">No Project Added Yet.</td>
                        </tr>
                        
                        <?php
                    }
                }
            
            ?>
            
            </tbody>
        </table>
    
    </div>


    <br>

    <script  src="./tabscript.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    </body>

</html>