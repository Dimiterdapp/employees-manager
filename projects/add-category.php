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
        <title>Add Category</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/rectangle.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
        <link rel="stylesheet" href="./css/tabstyle.css">
        <link rel="stylesheet" href="styleico.css">
    </head>
    
    <body>

        <div class="wrapper" style="text-align: center">
    
        
        <p>
        
        <?php 
        
            //Check whether the session is created or not
            if(isset($_SESSION['add_fail']))
            {
                //display session message
                echo $_SESSION['add_fail'];
                //Remove the message after displaying once
                unset($_SESSION['add_fail']);
            }
        
        ?>
        
        </p>

        <div>
		<h2>Admin - Add Category Page</h2>
		
	    </div>

        <div class="header">
        <a class="btn mt-4" href="<?php echo SITEURL; ?>manage-category.php">Manage Categories</a>
        </div>
        
        <!-- Form to Add Category Starts Here -->
        
        <form method="POST" action="">
            
            <table class="container">
            <thead>
                <tr>
                    <td>Category Name: </td>
                    <td><input type="text" name="category_name" placeholder="Type category name here" required="required" /></td>
                </tr>
                <tr>
                    <td>Category Description: </td>
                    <td><textarea name="category_description" placeholder="Type category Description Here"></textarea></td>
                </tr>
                
                </thead>
            </table>
            <input class="btn mt-4" type="submit"  name="submit"  />
        </form>
        
        <!-- Form to Add Category Ends Here -->
        </div>

    
    </body>
</html>


<?php 

    //Check whether the form is submitted or not
    if(isset($_POST['submit']))
    {
        //echo "Form Submitted";
        
        //Get the values from form and save it in variables
        $category_name = $_POST['category_name'];
        $category_description = $_POST['category_description'];
        
        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //Check whether the database connected or not
        /*
        if($conn==true)
        {
            echo "Database Connected";
        }
        */
        
        //SElect Database
        $db_select = mysqli_select_db($conn, DB_NAME);
        
        //Check whether database is connected or not
        /*
        if($db_select==true)
        {
            echo "Database SElected";
        }
        */
        //SQL Query to Insert data into database
        $sql = "INSERT INTO categories SET 
            category_name = '$category_name',
            category_description = '$category_description'
        ";
        
        //Execute Query and Insert into Database
        $res = mysqli_query($conn, $sql);
        
        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Data inserted successfully
            //echo "Data Inserted";
            
            //Create a SESSION VAriable to Display message
            $_SESSION['add'] = "Category Added Successfully";
            
            //Redirect to Manage Category Page
            header('location:'.SITEURL.'manage-category.php?');
            
        }
        else
        {
            //Failed to insert data
            //echo "Failed to Insert Data";
            
            //Create SEssion to save message
            $_SESSION['add_fail'] = "Failed to Add Category";
            
            //REdirect to Same Page
            header('location:'.SITEURL.'add-category.php');
        }
        
    }

?>

































