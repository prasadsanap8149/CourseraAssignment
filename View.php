<?php

if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){
   
    require_once "dbconnection.php";
    

    $sql = "SELECT * FROM Registration WHERE ID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
       
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
       
        $param_id = trim($_GET["ID"]);
        
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $id=$row['ID'];
                $fname=$row['FIRST'];
                $mname=$row['MIDDLE'];               
                $lname=$row['LAST'];
                $gender=$row['GENDER'];
                $mobile=$row['MOBILE'];
                $email=$row['EMAIL'];
                $address=$row['ADDRESS'];
                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                echo "Somthing Wrong";
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    echo "Somthing Wrong";
   
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW</title>
</head>

<body>
    <center>
        
        <div>
            <form >
                <label>CREATE OPERATION</label>
                <table border="1px">
                    <tr>
                        <td colspan="2">First Name:</td>
                        <td colspan="2"><?php echo $fname; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Middle Name:</td>
                        <td colspan="2"><?php echo $mname; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Last Name:</td>
                            <td colspan="2"><?php echo $lname; ?></td>
                            </tr>
                <tr>
                    <td colspan="2">Mobile Number:</td>
                    <td colspan="2"><?php echo $mobile; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Email ID:</td>
                            <td colspan="2"><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Gender:</td>
                    <td > <?php echo $gender; ?>  </td>
                </tr>
            </table>
            <?php
            
                echo "<td><a href='update.php?ID=". $id."' title='Update' data-toggle='tooltip'><button>Update</button></a></td>";
                echo "<td><a href='delete.html?ID=". $param_id ."' title='Delete' data-toggle='tooltip'><button>Delete</button></a></td>";
            ?>
        </form>
    </div>

</center>
</body>

</html>