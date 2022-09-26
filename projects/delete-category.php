<?php 
        //Include constants.php
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
    //echo "Delete Category Page";
    
    //Check whether the category_id is assigned or not
    
    if(isset($_GET['category_id']))
    {
        //Delete the Category from database
        
        //Get the category_id value from URL or Get Method
        $category_id = $_GET['category_id'];
        
        //Connect the DAtabase
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //Write the Query to DELETE Category from DAtabase
        $sql = "DELETE FROM categories WHERE category_id=$category_id";
        
        //Execute The Query
        $res = mysqli_query($conn, $sql);
        
        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed Successfully which means Category is deleted successfully
            $_SESSION['delete'] = "Category Deleted Successfully";
            
            //Redirect to Manage Category Page
            header('location:'.SITEURL.'manage-category.php');
        }
        else
        {
            //Failed to Delete Category
            $_SESSION['delete_fail'] = "Failed to Delete Category.";
            header('location:'.SITEURL.'manage-category.php');
        }
    }
    else
    {
        //Redirect to Manage Category Page
        header('location:'.SITEURL.'manage-category.php');
    }
    

?>