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
                    <li><a href="index.html">Home</a></li>

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
        
            
            <form action="news.php" method="post" class="input-group">
                <h2 style="color:rgb(148, 91, 120); margin-left: 10px;margin-bottom: 20px; font-size: 35px" align="center">Post News</h2>
                    <!-- <input type="text" class="input-field" name="skill" placeholder="Domain/Skill" required> -->
                   
                    <input type="text" class="input-field" name="news" placeholder="Enter News" required>
                    <br>
                    <br>
                    <br>
                    <input type="submit" name="apply"  class="submit-btn"  value="submit">
            </input>
            </form>
        
    
    </div>

</body>
</html>

<?php 

if(isset($_POST['apply'])){
    
    $news=$_POST['news'];
    $sql="INSERT into news(date,newdes) values(SYSDATE(),'$news')";
    $res=mysqli_query($conn,$sql);

}

?>