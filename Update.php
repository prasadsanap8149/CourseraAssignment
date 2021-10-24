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
    <title>UPDATE</title>
    
</head>

<body>
    <center>
        
        <div>
            <form action="<?php $_PHP_SELF ?>" method="POST" name="myForm">
                <label>UPDATE OPERATION</label>
                <table>
                    <tr>
                        <td colspan="2">First Name</td>
                    <td colspan="2">:<input type="text" name="fname"
                        oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" value=<?php echo $fname; ?>
                        required></td>
                    </tr>
                    <tr>
                        <td colspan="2">Middle Name</td>
                        <td colspan="2">:<input type="text" name="mname"
                            oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" value=<?php echo $mname; ?>
                            required></td>
                        </tr>
                        <tr>
                            <td colspan="2">Last Name</td>
                            <td colspan="2">:<input type="text" name="lname"
                                oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" value=<?php echo $lname; ?>
                                required></td>
                            </tr>
                <tr>
                    <td colspan="2">Mobile Number</td>
                    <td colspan="2">:<input type="text" name="mobile"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value=<?php echo $mobile; ?>
                            maxlength="10" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">Email ID</td>
                            <td colspan="2">:<input type="email" name="email"
                                 value=<?php echo $email; ?>
                                required></td>
                </tr>
                <tr>
                    <td colspan="2">Gender</td>
                    <td >
                        :<input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female
                        <input type="radio" name="gender" value="Others">Others
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Address</td>
                    <td >
                        :<input type="text" name="address">
                    </td>
                </tr>
            </table>
            <button>SAVE</button>
            <button href="Index.php">CANCEL</button>
        </form>
    </div>

</center>
</body>

</html>