<?php 
session_start();
$mid=$_SESSION['mid'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conevent.css">
    <title>Conduct Events</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
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
    <br><br>
    <h1 style="color:black; margin-left: 630px;">EVENTS</h1>
    <br>
    <div class="bg">
<div class="instr">
     <br>
    <h2 style="color:white; margin-left: 65px;">Upcoming events</h2>
    <br>
    <?php 
    
    
    // $host='localhost';
    // $username='alum';
    // $pass='123';
    // $dbname='alum';
    // $conn=mysqli_connect($host,$username,$pass,$dbname);

    include 'config.php';



    $sql = "SELECT * from events where dates > SYSDATE() order by dates asc  limit 1";
    // $res=mysqli_query($conn,$sql);
    $res=$conn->prepare($sql);
    $res->execute();
    
    while($comr = $res->fetch()){                    
        ?>
        <p style="color: azure;">
            <h4 style="">Title: <?php echo $comr['name'];?> </h4>
            <?php
            $title = $comr['name'];
            $sql1 = "SELECT * from registrations where name = '$title' ";
            // $res1=mysqli_query($conn,$sql1);
            $res1=$conn->prepare($sql1);
            $res1->execute();
             $count = $res1->rowCount();
             ?>
             <p> No. Of Registrations: <?php echo $count;?></p>
             
            <p> Duration: <?php echo $comr['duration'];?></p>
            <p> Venue: <?php echo $comr['venue'];?></p>
            <p> Date: <?php echo $comr['dates'];?></p>
            <p> Time: <?php echo $comr['time'];?></p>

    </p>
        <?php }?>

  
    <br><br>   
</div>

<div class="past">
    <br>
    <h2 style="color:white; margin-left: 65px;">Recent Events</h2>
    <br>
    <?php 
    #session_start();
    
    $host='localhost';
    $username='alum';
    $pass='123';
    $dbname='alum';
    $conn=mysqli_connect($host,$username,$pass,$dbname);
    $sql = "SELECT * from events where dates < SYSDATE() order by dates desc  limit 1";
    $res=mysqli_query($conn,$sql);
    while($comr = mysqli_fetch_array($res)){                    
        ?>
        <p style="color: azure;">
            <h4 style="">Title: <?php echo $comr['name'];?> </h4>
            <p> Duration: <?php echo $comr['duration'];?></p>
            <p> Venue: <?php echo $comr['venue'];?></p>
            <p> Date: <?php echo $comr['dates'];?></p>
            <p> Time: <?php echo $comr['time'];?></p>

    </p>
        <?php }?>  
   <br><br>
</div>
<div class="apply">
    
    <h2 style="color:white; margin-left: 50px;">New Event</h2>
    <form action="conevent.php" method="post" class="input-group">
                <input type="text" class="input-field" name="name" placeholder="Title Of the Event" required>
                <input type="text" class="input-field" name="duration" placeholder="Duration of the event" required>
                <input type="text" class="input-field" name="gist" placeholder="Gist of the event" required>
                <input type="text" class="input-field" name="prereq" placeholder="Prerequisites resquired" required>
                <input type="text" class="input-field" name="venue" placeholder="Venue" required>
                <br><br>
                <p style="color: gray; display: inline; margin-left: 10px;">Date:</p>
                <input type="date" class="input-field" name="date" style="margin-left: 10px;" required >
                <br><br>
                <input type="text" class="input-field" name="time" placeholder="Timings" required>
                <br><br>
                <input type="submit" name="apply"  class="submit-btn"  value="submit">
    </input>
    </form>

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
                      
                </p>
                </div>
               
                    <?php $i++;}?>

             </div>
        </div>
        


    </div>




<?php 
    
    
    $host='localhost';
    $username='alum';
    $pass='123';
    $dbname='alum';
    $conn=mysqli_connect($host,$username,$pass,$dbname);
    if(!$conn){
         die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['apply'])){
        $name=$_POST['name'];
        $duration=$_POST['duration'];
        $gist=$_POST['gist'];
        $prereq = $_POST['prereq'];
        $venue = $_POST['venue'];
        $date = $_POST['date'];
        $time =$_POST['time'];
        $sql="INSERT INTO events(name, duration, gist, prereq, venue, dates, time,mid) VALUES ('$name','$duration','$gist','$prereq','$venue', '$date', '$time','$mid' )";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo "<script>alert('Event posted'); </script>";
            header('location: conevent.php');
        }
        else{
            echo "<script>alert('Event not Posted'); </script>";
            header('location: conevent.php');
        }
    }
    




    ?> 