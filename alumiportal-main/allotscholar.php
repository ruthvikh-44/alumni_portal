<?php 
session_start();

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
    <link rel="stylesheet" href="mentrr.css">
    <title>Dashboard</title>
</head>
<body>

    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="index.html">Home</a></li>

                    <li><a href="logof.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
    <div class="back">
    <div id="services">
            <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="sub-title" align="center" >SCHOLARSHIP REQUESTS</h1>
             <div class="services-list">
             
        <?php 
        
            $sql="SELECT * from scholar";
            $resi=mysqli_query($conn,$sql);

            $i=1;
            while($rows=mysqli_fetch_assoc($resi)){
            ?>

        
                <div id="odiv">
                <section class="procon">
                    <div class="card">
                    
                      
                      <h2><?php echo $rows['name'];?></h2>
                     <p>
                        <table  cellspacing="10px" cellpadding="0px">
                           
                            <tr>
                                <th>Department: </th>
                                <td><?php echo $rows['department']; ?></td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td><?php echo $rows['email'];?></td>
                            </tr>
                            <tr>
                                <th>Registration Number: </th>
                                <td><?php echo $rows['roll']." "; ?></td>
                            </tr>
                            <tr>
                                <th>Year of study: </th>
                                <td><?php echo $rows['year']." "; ?> </td>
                            </tr>
                            <tr>
                                <td>
                            <button style="width: 100px; height: 40px; background-color: #9740f4;border-radius:30px;text-align:center;"><a href="<?php echo $rows['resume'];?>">Resume</a></button>
                             </td>
                            <td><button style="width: 100px; height: 40px; background-color: #9740f4;border-radius:30px;text-align:center;"><a href="<?php echo $rows['income'];?>">Income certificate</a></button>
                           </td>
                         <td>
                            <button style="width: 100px; height: 40px; background-color: #9740f4;border-radius:30px;text-align:center;"><a href="<?php echo $rows['lor'];?>">LOR</a></button>
                             </td>
                            </tr>
                            
                            
                        </table>
                        
                        <button type="submit" id="rebut"  name="<?php echo $i; ?>" >Approve</button>


                     </p>
                    </div>
                </div>

    <?php $i++;    }?>

                            </div>
            
                        
             </div>

    </div></form>
</body>
</html>
