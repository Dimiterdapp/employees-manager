<?php 
    include('../functions.php');

    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    
    // if (isset($_GET['logout'])) {
    //     session_destroy();
    //     unset($_SESSION['user']);
    //     header("location: ../login.php");
    // }
?>

<html>
    <head>
        <title>Add Project</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/rectangle.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
        <link rel="stylesheet" href="./css/tabstyle.css">
    </head>
    
    <body>
    
        <div class="wrapper" style="text-align: center">
        
        
        
        <p>
            <?php 
            
                if(isset($_SESSION['add_fail']))
                {
                    echo $_SESSION['add_fail'];
                    unset($_SESSION['add_fail']);
                }
            
            ?>
        </p>
        
        <div>
		<h2>Admin - Add Project Page</h2>
		
	    </div>

        <div class="header">
        <a class="btn mt-4" href="<?php echo SITEURL; ?>index.php">Manage Projects</a>
        
        </div>

        <form method="POST" action="">
            
            <table class="container">
            <thead>
            <tr>
                    <td>Assigned To: </td>
                    <td><input type="text" name="employee_name" placeholder="Type Employee Name" required="required" /></td>
                </tr>

                <tr>
                    <td>Project Name: </td>
                    <td><input type="text" name="project_name" placeholder="Type your Project Name" required="required" /></td>
                </tr>
                
                <tr>
                    <td>Project Description: </td>
                    <td><textarea name="project_description" placeholder="Type Project Description"></textarea></td>
                </tr>
                
                <tr>
                    <td>Select Category: </td>
                    <td>
                        <select name="category_id">
                            
                            <?php 
                                
                                //Connect Database
                                $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                                
                                //SElect Database
                                $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                                
                                //SQL query to get the category from table
                                $sql = "SELECT * FROM categories";
                                
                                //Execute Query
                                $res = mysqli_query($conn, $sql);
                                
                                //Check whether the query executed or not
                                if($res==true)
                                {
                                    //Create variable to Count Rows
                                    $count_rows = mysqli_num_rows($res);
                                    
                                    //If there is data in database then display all in dropdows else display None as option
                                    if($count_rows>0)
                                    {
                                        //display all Categories on dropdown from database
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $category_id = $row['category_id'];
                                            $category_name = $row['category_name'];
                                            ?>
                                            <option value="<?php echo $category_id ?>"><?php echo $category_name; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        //Display None as option
                                        ?>
                                        <option value="0">None</option>p
                                        <?php
                                    }
                                    
                                }
                            ?>
                        
                            
                        </select>
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Priority: </td>
                    <td>
                        <select name="priority">
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Deadline: </td>
                    <td><input type="date" name="deadline" /></td>
                </tr>
                
                </tbody>
            </table>
            <input class="btn mt-4" type="submit" name="submit" value="SAVE" />
        </form>
        
        </div>
    
    </body>
    
</html>


<?php 

    //Check whether the SAVE button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the Values from Form
        $employee_name = $_POST['employee_name'];
        $project_name = $_POST['project_name'];
        $project_description = $_POST['project_description'];
        $category_id = $_POST['category_id'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];
        
        //Connect Database
        $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
        
        //CReate SQL Query to INSERT DATA into DAtabase
        $sql2 = "INSERT INTO projects SET 
            employee_name = '$employee_name',
            project_name = '$project_name',
            project_description = '$project_description',
            category_id = $category_id,
            priority = '$priority',
            deadline = '$deadline'
        ";
        
        //Execute Query
        $res2 = mysqli_query($conn2, $sql2);
        
        //Check whetehre the query executed successfully or not
        if($res2==true)
        {
            //Query Executed and Project Inserted Successfully
            $_SESSION['add'] = "Project Added Successfully.";
            
            //Redirect to Homepage
            header('location:'.SITEURL.'index.php?');
            
        }
        else
        {
            //FAiled to Add Project
            $_SESSION['add_fail'] = "Failed to Add Project";
            //Redirect to Add Project Page
            header('location:'.SITEURL.'add-project.php');
        }
    }

?>




































