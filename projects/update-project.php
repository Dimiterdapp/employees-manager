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
    
    //Check the Project ID in URL
    
    if(isset($_GET['project_id']))
    {
        //Get the Values from DAtabase
        $project_id = $_GET['project_id'];
        
        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //Select Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //SQL Query to Get the detail of selected project
        $sql = "SELECT * FROM projects WHERE project_id=$project_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //Check if the query executed successfully or not
        if($res==true)
        {
            //Query <br />Executed
            $row = mysqli_fetch_assoc($res);
            
            //Get the Individual Value
            $employee_name = $row['employee_name'];
            $project_name = $row['project_name'];
            $project_description = $row['project_description'];
            $category_id = $row['category_id'];
            $priority = $row['priority'];
            $deadline = $row['deadline'];
        }
    }
    else
    {
        //Redirect to Homepage
        header('location:'.SITEURL);
    }
?>

<html>
    <head>
        <title>Update Project</title>
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
                if(isset($_SESSION['update_fail']))
                {
                    echo $_SESSION['update_fail'];
                    unset($_SESSION['update_fail']);
                }
            ?>
        </p>

        <div>
		<h2>Admin - Update Project Page</h2>
		
	    </div>

        <div class="header">
        <a class="btn mt-4" href="<?php echo SITEURL; ?>">Manage Projects</a>
        </div>
        
        <form method="POST" action="">
        
            <table class="container">
            <thead>
            <tr>
                    <td>Assigned To: </td>
                    <td><input type="text" name="employee_name" value="<?php echo $employee_name; ?>" required="required" /></td>
                </tr>

                <tr>
                    <td>Project Name: </td>
                    <td><input type="text" name="project_name" value="<?php echo $project_name; ?>" required="required" /></td>
                </tr>
                
                <tr>
                    <td>Project Description: </td>
                    <td>
                        <textarea name="project_description">
                        <?php echo $project_description; ?>
                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>Select Category: </td>
                    <td>
                        <select name="category_id">
                            
                            <?php 
                                //Connect Database
                                $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                                
                                //SElect Database
                                $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
                                
                                //SQL Query to GET Categories
                                $sql2 = "SELECT * FROM categories";
                                
                                //Execute Query
                                $res2 = mysqli_query($conn2, $sql2);
                                
                                //Check if executed successfully or not
                                if($res2==true)
                                {
                                    //Display the Categories
                                    //Count Rows
                                    $count_rows2 = mysqli_num_rows($res2);
                                    
                                    //Check whether Category is added or not
                                    if($count_rows2>0)
                                    {
                                        //Categories are Added
                                        while($row2=mysqli_fetch_assoc($res2))
                                        {
                                            //Get individual value
                                            $category_id_db = $row2['category_id'];
                                            $category_name = $row2['category_name'];
                                            ?>
                                            
                                            <option <?php if($category_id_db==$category_id){echo "selected='selected'";} ?> value="<?php echo $category_id_db; ?>"><?php echo $category_name; ?></option>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        //No Category Added
                                        //Display None as option
                                        ?>
                                        <option <?php if($category_id=0){echo "selected='selected'";} ?> value="0">None</option>p
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
                            <option <?php if($priority=="High"){echo "selected='selected'";} ?> value="High">High</option>
                            <option <?php if($priority=="Medium"){echo "selected='selected'";} ?> value="Medium">Medium</option>
                            <option <?php if($priority=="Low"){echo "selected='selected'";} ?> value="Low">Low</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Deadline: </td>
                    <td><input type="date" name="deadline" value="<?php echo $deadline; ?>" /></td>
                </tr>
                
                </tbody>
            </table>
            <input class="btn mt-4" type="submit" name="submit" value="UPDATE" />
        
        </form>
        
        </div>
    </body>
</html>


<?php 

    //Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        
        //Get the CAlues from Form
        $employee_name = $_POST['employee_name'];
        $project_name = $_POST['project_name'];
        $project_description = $_POST['project_description'];
        $category_id = $_POST['category_id'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];
        
        //Connect Database
        $conn3 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //SElect Database
        $db_select3 = mysqli_select_db($conn3, DB_NAME) or die(mysqli_error());
        
        //CREATE SQL QUery to Update Project
        $sql3 = "UPDATE projects SET 
        employee_name = '$employee_name',
        project_name = '$project_name',
        project_description = '$project_description',
        category_id = '$category_id',
        priority = '$priority',
        deadline = '$deadline'
        WHERE 
        project_id = $project_id
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);
        
        //CHeck whether the Query Executed of Not
        if($res3==true)
        {
            //Query Executed and Project Updated
            $_SESSION['update'] = "Project Updated Successfully.";
            
            //Redirect to Home Page
            ?><script><?php echo("location.href = '".SITEURL."/index.php?';");?></script><?php
        }
        else
        {
            //FAiled to Update Project
            $_SESSION['update_fail'] = "Failed to Update Project";
            
            //Redirect to this Page
            header('location:'.SITEURL.'update-project.php?project_id='.$project_id);
        }
        
        
    }

?>









































