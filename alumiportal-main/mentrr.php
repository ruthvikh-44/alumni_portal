<?php 
session_start();
$name=$_SESSION['name'];
$reg=$_SESSION['reg'];

$host='localhost';
$username='alum';
$pass='123';
$dbname='alum';
$conn=mysqli_connect($host,$username,$pass,$dbname);
if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * from mendom";
$res=mysqli_query($conn,$sql);
$cnt=mysqli_num_rows($res);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mentrr.css">
    <title>Dashboard</title>
</head>
<body>

    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="studir.php">Home</a></li>

                    <li><a href="logout_s.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
<div class = 'res1'>
 <div id='filterby' class='search'>
    <form action="mentrr.php" method='post'>
                <h3>Filter By</h3>
                 <input type="radio" name='filter' id='filter' value="batch" required>Batch <br>
                 <input type="radio" name='filter' id='filter' value='branch'required>Department<br>
                 <input type="text" name='ser'> <br><br>
                 <button type='submit' name='subu'>Search</button>
            </form>
    
    <?php 
    $flag=1;
    if(isset($_POST['subu'])){
        $chc=$_POST['filter'];
        $qr=$_POST['ser'];
        $flag=0;
    }
    ?>
    </div>
    <div class='search'>
    <form action="mentrr.php" method="post" enctype="multipart/form-data">
    <div id='uplos'>
        <h4>Upload Your Resume</h4>
        <br><br>
        <input type="file" name='ftu' id='ftu' required>
    </div>
 </div>
</div>
    <div class="back">
    <div id="services">
            <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="sub-title" align="center" >MENTORS</h1>
             <div class="services-list">
             
        <?php 
        $i=1;
        while($row=mysqli_fetch_assoc($res)){
            $mid=$row['mid'];
            if($mid==0){
                continue;
            }
            $domain=$row['domain'];
            $duration=$row['duration'];
            $sql="SELECT * from mentor where mid='$mid'";
            $resi=mysqli_query($conn,$sql);
            $rows=mysqli_fetch_assoc($resi);
            if(!$flag){
                if($chc=='batch'){
                if($rows['batch']!=$qr){
                    $i++;
                    continue;
                }}else{
                    if($rows['dept']!=$qr){
                        $i++;
                        continue;
                    } 
                }


            }
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
                            <tr>
                                <th>Skills:</th>
                                <td><?php echo $domain; ?></td>
                            </tr>
                            <tr>
                                <th>Duration: </th>
                                <td><?php echo $duration." "; ?> Months</td>
                            </tr>
                        </table>
                        
                        <button type="submit" id="rebut"  name="<?php echo $i; ?>" >Request</button>


                     </p>
                    </div>
                </div>

    <?php $i++;    }?>

                            </div>
            
                        
             </div>

    </div></form>
</div>
</body>
</html>

<?php 
    for($k=1;$k<=$cnt;$k++){
        if(isset($_POST[strval($k)])){
            $target_dir='stures/';
            $target_file = $target_dir . basename($_FILES["ftu"]["name"]);
            $chk=1;
          
          if (file_exists($target_file)) {
              $chk = 3;
            }
            $ftypee = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($ftypee != "jpg" && $ftypee != "png" && $ftypee != "jpeg" ) {
              echo "$ftypee is not allowed.Only jpeg,png,jpg is accepted";
              $chk = 0;
            }
          
            if ($chk == 1) {
              if (move_uploaded_file($_FILES["ftu"]["tmp_name"], $target_file)) {
                 
                  echo "The Image ". htmlspecialchars( basename( $_FILES["ftu"]["name"])). " has been uploaded.";
                  $resumee=$target_file;
          
                } else {
                  echo "Error in uploading the Image!!!";
                }
            }
            elseif($chk==3){
                $resumee=$target_file;
            }
            else {
             echo 'File not uploaded';
            }
            $sql="SELECT * from mendom";
                $res=mysqli_query($conn,$sql);
            for($j=1;$j<=$k;$j++){
                $row=mysqli_fetch_assoc($res);
            }
            $did=$row['did'];
            $mid=$row['mid'];
            $name=$_SESSION['name'];
            $reg=$_SESSION['reg'];
            $domain=$row['domain'];
            $sql="SELECT * from stureq where  reg='$reg' and did='$did' and mid='$mid'";
            $resl=mysqli_query($conn,$sql);
            $xc=mysqli_num_rows($resl);
            if($xc >0){
                echo "<script>alert('Already Registered!!!');</script>"; 
            }
            else{
            $sql="INSERT into stureq(reg,name,resume,did,mid,domain) values('$reg','$name','$resumee','$did','$mid','$domain')";
            $res=mysqli_query($conn,$sql);
            if($res){
                echo "<script>alert('Request sent!!!');</script>"; 
                
            }else{
                echo "<script>alert('Error in Sending Request!');</script>"; 
                
                
            }

        }


        }
    }




?>

