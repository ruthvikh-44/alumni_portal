<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="empop.css">
    <title>Upload Oppurtunities</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="Images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="mendir.php">Home</a></li>
                    <!-- <li><a href="index.html/#services">Information</a></li>
                    <li><a href="index.html/#logins">Sign up</a></li>
                    <li><a href="index.html/#contact">contact</a></li> -->
                    <li><a href="logof.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
        
    <h2 style="color:black; margin-left: 0px; font-size: 35px; margin-top: 15px;" align="center">Post Oppurtunity</h2>
    
    <div class="back">
    <div class="apply">

        <form action="empop.php" method="post" class="input-group">
                    <input type="text" class="input-field" name="company" placeholder="Company" required>
                    <input type="text" class="input-field" name="role" placeholder="Role" required>
                    <input type="text" class="input-field" name="batch" placeholder="Batch" required>
                    <input type="text" class="input-field" name="salary" placeholder="Salary" required>
                    <input type="text" class="input-field" name="exp" placeholder="Experience Required" required>
                    <input type="text" class="input-field" name="link" placeholder="Application Link" required>
                    <br><br>
                    <p style="color: gray; display: inline; margin-left: 35px;"> Last Date to Apply:</p>
                    <input type="date" name="lastdate" required style="margin-left: 10px;">
                    <br><br>
                    <br>
                    <input type="submit" name="apply"  class="submit-btn"  value="submit">
        </input>
        </form>
    
    </div>
</div>
</body>
</html>
<?php

    // $host='localhost';
    // $username='alum';
    // $pass='123';
    // $dbname='alum';
    // $conn=mysqli_connect($host,$username,$pass,$dbname);
    include 'config.php';
    if(isset($_POST['apply'])){
        $company = $_POST['company'];
        $role = $_POST['role'];
        $batch = $_POST['batch'];
        $salary = $_POST['salary'];
        $exp  = $_POST['exp'];
        $link = $_POST['link'];
        $lastdate = $_POST['lastdate'];
        $sql = "INSERT into oppurtunities(company,role,batch,salary,exp,link,lastdate) values('$company','$role','$batch','$salary','$exp','$link','$lastdate')";
        // $res = mysqli_query($conn,$sql);
        $res=$conn->prepare($sql);
        $res->execute();
        echo "<script>alert('Oppurtunity posted'); </script>";
        if($res){
            echo "<script>alert('Oppurtunity posted'); </script>";
            header('location: empop.php');
        }
        else{
            echo "<script>alert('Oppurtunity not posted'); </script>";
            header('location: empop.php');
        }
    }
?>