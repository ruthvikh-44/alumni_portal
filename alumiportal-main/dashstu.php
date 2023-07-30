<?php 
session_start();
$reg=$_SESSION['reg'];

$host='localhost';
$username='alum';
$pass='123';
$dbname='alum';
$conn=mysqli_connect($host,$username,$pass,$dbname);
if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
}


?>

<?php 
if(isset($_POST['avop'])){
    header('location:availop.php');
}
if(isset($_POST['roe'])){
    header('location:regevent.php');
}
if(isset($_POST['reqm'])){
   
    header('location:mentrr.php');
}
if(isset($_POST['reqs'])){
    header('location:scholarship.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashal.css">
    <title>student Dashboard</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="index.html">Home</a></li>
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
    <div style="background-image: url(images/dashstubg5.png); background-size: cover; " class= "back">
    <div id="services">
           
            <br><br><br><br><br>
             <div class="services-list">
                <form action="dashstu.php" method='post'>
                <div class="MS">
                    <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                   
                    <button type='submit' name='avop'> <h2>Avail Oppurtunities</h2></button>
                    
                </div>

                <div class="Gr">
                    <i class="fa-solid fa-money-bill" style="color: #ffffff;"></i>
                    
                    <button type='submit' name='roe'><h2>Register For Events</h2></button>
                    
                </div>
                <div class="Po">
                    <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                    
                    <button type='submit' name='reqm'><h2>Request Mentor</h2></button>
                    
                </div>
                <div class="Don">
                    <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                   
                    <button type='submit' name='reqs'> <h2>Request Scholarships</h2></button>
                    
                </div>
                <?php 
                $sql="SELECT * from stureq where reg='$reg' and stats='1'";
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){

                
                $row=mysqli_fetch_assoc($res);
                
                $mid=$row['mid'];
                $domain=$row['domain'];
                $duration=$row['duration'];
                $sql="SELECT * from mentor where mid='$mid'";       
                $res=mysqli_query($conn,$sql);
                $rows=mysqli_fetch_assoc($res);         
                ?>
                <div id="odiv">
                <section class="procon">
                    <div class="card">
                    <h2>Your Mentor</h2>
                      <div class="image">
                        
                        <img src="<?php echo $rows['photo'];?>" alt="" />
                        
                      </div>
                      <h2><?php echo $rows['fname'];?></h2>
                     <p>
                    
                        <table  cellspacing="10px" cellpadding="0px">
                           
                            <tr>
                                <th>Company: </th>
                                <td><?php echo $rows['company']; ?></td>
                            </tr>
                            <tr>
                                <th>Designation: </th>
                                <td><?php echo $rows['design'];?></td>
                            </tr>
                            <tr>
                                <th>Experience: </th>
                                <td><?php echo $rows['exp']." "; ?> Years</td>
                            </tr>
                            <tr>
                                <th>Skills:</th>
                                <td><?php echo $domain; ?></td>
                            </tr>
                            <tr>
                                <th>Duration: </th>
                                <td><?php echo $duration." "; ?> Months</td>
                            </tr>
                        </table>
                     </p>
                    </div>
                </div> <?php } ?>
                <!-- <div>
                    <h2>Your Mentor</h2>
                    <table>

                        <tr>
                            <th>Name: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Designation: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Domain: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Duration: </th>
                            <td></td>
                        </tr>
                    </table>
                </div> -->
                </form>
             </div>

    </div>
</div>
</body>
</html>
