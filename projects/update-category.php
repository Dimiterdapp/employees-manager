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
    
    
    //Get the Current Values of Selected Category
    if(isset($_GET['category_id']))
    {
        //Get the Category ID value
        $category_id = $_GET['category_id'];
        
        //Connect to Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect DAtabase
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //Query to Get the Values from Database
        $sql = "SELECT * FROM categories WHERE category_id=$category_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHekc whether the query executed successfully or not
        if($res==true)
        {
            //Get the Value from Database
            $row = mysqli_fetch_assoc($res); //Value is in array
            
            //printing $row array
            //print_r($row);
            
            //Create Individual Variable to save the data
            $category_name = $row['category_name'];
            $category_description = $row['category_description'];
        }
        else
        {
            //Go Back to Manage Category Page
            header('location:'.SITEURL.'manage-category.php');
        }
    }

?>




<html>

    <head>
        <title>Update Category</title>
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
                //Check whether the session is set or not
                if(isset($_SESSION['update_fail']))
                {
                    echo $_SESSION['update_fail'];
                    unset($_SESSION['update_fail']);
                }
            ?>
        </p>

        <div>
		<h2>Admin - Update Categories Page</h2>	
	    </div>

    <div class="header">
    <a class="btn mt-4" href="<?php echo SITEURL; ?>manage-category.php">Manage Categories</a>
    </div>
        
        <form method="POST" action="">
        
            <table class="container">
            <thead>
                <tr>
                    <td>Category Name: </td>
                    <td><input type="text" name="category_name" value="<?php echo $category_name; ?>" required="required" /></td>
                </tr>
                
                <tr>
                    <td>Category Description: </td>
                    <td>
                        <textarea name="category_description">
                            <?php echo $category_description; ?>
                        </textarea>
                    </td>
                </tr>
                
                </thead>
            </table>
            <input class="btn mt-4" type="submit" name="submit" value="UPDATE" />
        </form>
        
        </div>
        
    
    
    </body>

</html>


<?php 

    //Check whether the Update is Clicked or Not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        
        //Get the Updated Values from our Form
        $category_name = $_POST['category_name'];
        $category_description = $_POST['category_description'];
        
        //Connect Database
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect the Database
        $db_select2 = mysqli_select_db($conn2, DB_NAME);
        
        //QUERY to Update Category
        $sql2 = "UPDATE categories SET 
            category_name = '$category_name',
            category_description = '$category_description' 
            WHERE category_id=$category_id
        ";
        
        //Execute the Query
        $res2 = mysqli_query($conn2, $sql2);
        
        //Check whether the query executed successfully or not
        if($res2==true)
        {
            //Update Successful
            //SEt the Message
            $_SESSION['update'] = "Category Updated Successfully";
            
            //Redirect to Manage Category PAge
            header('location:'.SITEURL.'manage-category.php?');
        }
        else
        {
            //FAiled to Update
            //SEt Session Message
            $_SESSION['update_fail'] = "Failed to Update Category";
            //Redirect to the Update Category PAge
            header('location:'.SITEURL.'update-category.php?category_id='.$category_id);
        }
        
    }
?>









































