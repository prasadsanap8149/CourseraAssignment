<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        .table {
            text-align:center;
            border:1px solid black;
        }

        th{
            border:1px solid black;
            background-color:lightblue;
        }
        td{
            border:1px solid black;
            background-color:pink;
        }
        button{
            border-color:green;
            color:yellow;
            background-color:#0002;
        }
        </style>
</head>
<body>
    <div>
        <center>
        <h2>Student Data</h2>
             
               <?php
               require_once "dbconnection.php";
               $sql = "SELECT * FROM Registration ";
               if($result = mysqli_query($link, $sql)){
                   if(mysqli_num_rows($result) > 0){
                       echo "<table class='table table-bordered table-striped'>";
                           echo "<thead>";
                               echo "<tr>";
                                   echo "<th>ID</th>";
                                   echo "<th>FIRST</th>";
                                   echo "<th>MIDDLE</th>";
                                   echo "<th>LAST</th>";
                                   echo "<th>GENDER</th>";
                                   echo "<th>MOBILE</th>";
                                   echo "<th>EMAIL</th>";
                                   echo "<th>ADDRESS</th>";
                                   echo "<th colspan=3>ACTION</th>";
                                
                               echo "</tr>";
                           echo "</thead>";
                           echo "<tbody>";
                           while($row = mysqli_fetch_array($result)){
                               echo "<tr>";
                                       echo "<td>" . $row['ID'] . "</td>";
                                       echo "<td>" . $row['FIRST'] . "</td>";
                                       echo "<td>" . $row['MIDDLE'] . "</td>";
                                       echo "<td>" . $row['LAST'] . "</td>";
                                       echo "<td>" . $row['GENDER'] . "</td>";
                                       echo "<td>" . $row['MOBILE'] . "</td>";
                                       echo "<td>" . $row['EMAIL'] . "</td>";
                                       echo "<td>" . $row['ADDRESS'] . "</td>";
                                       echo "<td><a href='view.php?ID=". $row['ID'] ."' title='View' data-toggle='tooltip'><button>View</button></a></td>";
                                       echo "<td><a href='update.php?ID=". $row['ID'] ."' title='Update' data-toggle='tooltip'><button>Update</button></a></td>";
                                       echo "<td><a href='delete.html?ID=". $row['ID'] ."' title='Delete' data-toggle='tooltip'><button>Delete</button></a></td>";
                                      
                                 
                               echo "</tr>";
                           }
                           echo "</tbody>";                            
                       echo "</table>";
                      
                       mysqli_free_result($result);
                   } else{
                       echo "<p class='lead'><em>No records were found.</em></p>";
                   }
               } else{
                   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
               }

               mysqli_close($link);
               ?>

          
        </center>
    </div>
</body>
</html>