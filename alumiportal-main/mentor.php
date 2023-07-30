<?php 
        
session_start();   
$mid=$_SESSION['mid'];
$host='localhost';
$username='alum';
$pass='123';
$dbname='alum';
$conn=mysqli_connect($host,$username,$pass,$dbname);
if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
}
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mentor.css">
    <title>Mentorship</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="mendir.php">Home</a></li>

                    <li><a href="logout_a.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
    <br><br>
    <div class="apply">
        <div class="child1">
            <h1 style="color: black; margin-left: 30px; font-size: 67px;">Sharing knowledge, shaping futures.</h1>
 
        </div>
        
            
            <form action="mentor.php" method="post" class="input-group">
                <h2 style="color:rgb(148, 91, 120); margin-left: 10px;margin-bottom: 20px; font-size: 35px" align="center">Post Mentorship</h2>
                    <input type="text" class="input-field" name="skill" placeholder="Domain/Skill" required>
                    <input type="text" class="input-field" name="duration" placeholder="Duration" required>
                    <br>
                    <br>
                    <br>
                    <input type="submit" name="apply"  class="submit-btn"  value="submit">
            </input>
            </form>
        
    
    </div>
    <form action="mentor.php" method='post'>
       <div id="services">
        
        <div class="container">
            <h1 style="color: aquamarine;margin-top: 16px;" class="sub-title">REQUESTS</h1>
             <div class="services-list">

             <?php 
             $sql="SELECT * from stureq where stats=2 and mid='$mid' ";
             $res=mysqli_query($conn,$sql);
             $cnt=mysqli_num_rows($res);
             $acnt=1;
             $rcnt=1000;
             while($row=mysqli_fetch_assoc($res)){

            
             ?>
                <div>
            
                    <h2><?php echo $row['name']; ?></h2>
                    <p><?php echo $row['reg'];?></p>
                    <p><?php echo $row['domain']; ?></p>
                    <p><a href="<?php echo $row['resume']; ?>" target="_blank">view resume</a></p>
                   
                       
                        <button type="submit"  name='<?php echo $acnt;?>'>Accept</button>
                        <button type="submit"  name='<?php echo $rcnt;?>'>Reject</button>
                        
                   

                </div>
              <?php $acnt++;
            $rcnt++; }?>
             </div>
        </div>

    </div>
    </form>
    <?php 

    

    if(isset($_POST['apply'])){
        
        $skill=$_POST['skill'];
        $duration=$_POST['duration'];
        $mid=$_SESSION['mid'];
        $sql="INSERT INTO mendom(mid, domain, duration) VALUES ('$mid','$skill','$duration')";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo "<script>alert('Mentorship availability posted'); </script>";
            header('location:mentor.php');
        }else{
            echo "<script>alert('Mentorship availability posted'); </script>";
            header('location:mentor.php');
        }
    }

     else{
        
        $mid=$_SESSION['mid'];
    
     for($k=1;$k<=$cnt;$k++){
         if(isset($_POST[strval($k)])){
             $sql="SELECT * from stureq where stats='2' and mid='$mid'";
             $res=mysqli_query($conn,$sql);
            
             for($j=1;$j<=$k;$j++){
                 $row=mysqli_fetch_assoc($res);
             }
             $did=$row['did'];
             $reg=$row['reg'];
             $sql="UPDATE stureq SET stats='1' WHERE did='$did' and reg='$reg' and mid='$mid' ";
             $res=mysqli_query($conn,$sql);
             if($res){
                echo "<script>alert('Accepted mentorship request'); </script>";
             }
            
             break;
         }
         elseif(isset($_POST[strval($k+1000)])){
             $sql="SELECT * from stureq where status='2' and mid='$mid'";
             $res=mysqli_query($conn,$sql);
             for($j=1;$j<=$k;$j++){
                 $row=mysqli_fetch_assoc($res);
             }
             $did=$row['did'];
             $reg=$row['reg'];
             $sql="UPDATE stureq SET stats='0' WHERE did='$did' and reg='$reg' and mid='$mid' ";
             $res=mysqli_query($conn,$sql);
             if($res){
                echo "<script>alert('Rejected mentorship request'); </script>";
             }
             break;
         }
     }

     }
    
    ?> 
