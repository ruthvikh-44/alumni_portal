<?php 
session_start();
$reg=$_SESSION['reg'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regevent.css">
    <title>Registration for events</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="studir.php">Home</a></li>
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
    <div id="image">
        <div class="child1">
           <!-- <h1 style="color: black; margin-top:50px; margin-left: 50px; font-size: 37px;"> Informative, interactive sessions by your Alumni, just for you !</h1>
            -->
        </div>
       
    </div>
    <div id="services">
        <div class="container">
            <h1 class="sub-title">UPCOMING EVENTS</h1>
             <div class="services-list">
                
                
                <?php
                $host='localhost';
                $username='alum';
                $pass='123';
                $dbname='alum';
                $conn=mysqli_connect($host,$username,$pass,$dbname);
                $sql = "SELECT * from events where dates > SYSDATE()";
                $res = mysqli_query($conn,$sql);
                $cnt=mysqli_num_rows($res);
                $i=1;
                while($comr = mysqli_fetch_array($res)){    
                    $eid=$comr['eid'];
                    $sli="SELECT * from registrations where reg = '$reg' and eid='$eid'";
                    $skip=mysqli_query($conn,$sli);
                    if(mysqli_num_rows($skip)>0){
                        $i++;
                        continue;
                        
                    }                
                    ?>
                    <div>
                    <p style="color: azure;">
                        <h2 style="">Title: <?php echo $comr['name'];?> </h2>
                        <p> Gist: <?php echo $comr['gist'];?></p>
                        <p> Prerequisites: <?php echo $comr['prereq'];?></p> 
                        <p> Duration: <?php echo $comr['duration'];?></p>
                        <p> Venue: <?php echo $comr['venue'];?></p>
                        <p> Date: <?php echo $comr['dates'];?></p>
                        <p> Time: <?php echo $comr['time'];?></p>
                        <form action="regevent.php" method="post">
                        <!-- <input type="submit" name="sub"value="Register"> -->
                        <button type='submit' name="<?php echo $i;?>" >Register</button>
                        

       
                    </form>
                </p>
                </div>
               
                    <?php $i++;}?>

                    <?php 
                    
                    for($k=1;$k<=$cnt;$k++){
                        if(isset($_POST[strval($k)])){
                            $sql = "SELECT * from events where dates > SYSDATE()";
                            $res=mysqli_query($conn,$sql);
                            $row="";
                            for($j=1;$j<=$k;$j++){
                                $row=mysqli_fetch_assoc($res);
                            }
                            $title=$row['name'];
                            $reg=$_SESSION['reg'];
                            $reg=intval($reg);
                            $eve=$row['eid'];
                            $sql1 = "INSERT into registrations(name,reg,eid) values('$title','$reg','$eve')";
                            $res1 = mysqli_query($conn,$sql1);
                            
                            echo "<script>alert('Event registration successful');</scrip>";
                            ?> <meta http-equiv="refresh" content="0.5"><?php 

                        }

                    }
                    ?>


             </div>
        </div>
        


    </div>
    <div id="services">
        <div class="container">
            <h1 class="sub-title">REGISTERED EVENTS</h1>
             <div class="services-list">

               
                    <?php
                    $reg=$_SESSION['reg'];
                    $sql2 = "SELECT * from registrations where reg = '$reg'";
                    $res2=mysqli_query($conn,$sql2);
                    while($con = mysqli_fetch_array($res2)){                    
                        ?>

                        <?php
                        $eid = $con['eid'];
                        $sql3 = "SELECT * from events where eid = '$eid'";
                        $res3 =mysqli_query($conn,$sql3);
                        while($com = mysqli_fetch_array($res3)){ 
                        ?>
                         <div>
                        <p style="color: azure;">
                            <h4 style="">Title: <?php echo $com['name'];?> </h4>
                            <p> Duration: <?php echo $com['duration'];?></p>
                            <p> Venue: <?php echo $com['venue'];?></p>
                            <p> Date: <?php echo $com['dates'];?></p>
                            <p> Time: <?php echo $com['time'];?></p>
                            <?php }?> 
                           

                    </p>
                    </div>
                        <?php }?>  
                        
                
             </div>
        </div>

    </div>

</body>
</html>