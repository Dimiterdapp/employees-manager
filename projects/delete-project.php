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
    
    //Check project_id in URL
    if(isset($_GET['project_id']))
    {
        //Delete the Project from Database
        //Get the Project ID
        $project_id = $_GET['project_id'];
        
        //Connect Databaes
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //SQL Query to DELETE Project
        $sql = "DELETE FROM projects WHERE project_id=$project_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHeck if the Query Executed Successfully or Not
        if($res==true)
        {
            //Query Executed Successfully and Project Deleted
            $_SESSION['delete'] = "Project Deleted Successfully.";
            
            //redirect to Homepage
            header('location:'.SITEURL);
        }
        else
        {
            //FAiled to Delete Project
            $_SESSION['delete_fail'] = "Failed to Delete Project";
            
            //Redirect to Home PAge
            header('location:'.SITEURL);
        }
        
    }
    else
    {
        //Redirect to Home
        header('location:'.SITEURL);
    }

?>