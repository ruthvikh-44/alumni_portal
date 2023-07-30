<?php 
session_start();

$mid = $_SESSION['mid'];
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
    <link rel="stylesheet" href="coalum.css">
    <title>Alumni Connection</title>
</head>
<body>

    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="mendir.php">Home</a></li>

                    <li><a href="logout_s.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
    <div class="back">
    <div id="services">
            <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="sub-title" align="center" >MENTORS</h1>
            <div class='par'>
            <div id= 'child'>
            <form action="coalum.php" method='post'>
                <h3>Filter By</h3>
                 <input type="radio" name='filter' id='filter' value="batch" required>Batch <br>
                 <input type="radio" name='filter' id='filter' value='branch'required>Department <br>
                 <input type="text" name='ser'> <br>
                 <button type='submit' name='subu'>Search</button>
            </form>
</div>

        </div>
        <div id='child1'>
        <br>
            <form action="coalum.php" method='post'>
                
                <button id = "chat" type='submit' name='chat'>CHAT</button>
            </form>
        </div>
            <div class="services-list">
             
        <?php 

        if(isset($_POST['subu'])){
            $chc=$_POST['filter'];
            $qr=$_POST['ser'];
            if($chc=='branch'){
                $sql="SELECT * from mentor where mid <> '$mid' and dept='$qr'";
            }else if($chc=='batch'){
                $sql="SELECT * from mentor where mid <> '$mid' and batch='$qr'";
            }else{
                $sql="SELECT * from mentor where mid <> '$mid'";
            }
            $resi=mysqli_query($conn,$sql);
            while($rows=mysqli_fetch_assoc($resi)){
            ?>

        
                <div id="odiv">
                <section class="procon">
                    <div class="card">
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
                        </table>
                        
                        <!-- <button type="submit" id="rebut"  name="chat" >Chat</button> -->


                     </p>
                    </div>
                </div>
                <?php } 

        
}
?>
            
           
                            </div>
            
                        
             </div>

    </div>
</div>
</body>
</html>

<?php 
if(isset($_POST['chat'])){
    header('location:chat/login.php');
}

?>