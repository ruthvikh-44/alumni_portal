<?php 
// $host='localhost';
// $username='alum';
// $pass='123';
// $dbname='alum';
// $conn=mysqli_connect($host,$username,$pass,$dbname);
// if(!$conn){
//      die("Connection failed: " . mysqli_connect_error());
// }
include 'config.php';
if(isset($_POST['mregsub'])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $reg=$_POST['reg'];
    $dept = $_POST['dept'];
    $batch = $_POST['batch'];
    $phone=$_POST['phone'];
    $company=$_POST['company'];
    $design=$_POST['design'];
    $exp=$_POST['exp'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $linkedin=$_POST['linked'];
    // $certificate=$_POST['cert'];
    $certificate="";    
  //  $gender=$_POST['gender'];


  //   $target_dir='mentor_cert/';
  //   $target_file = $target_dir . basename($_FILES["ftu"]["name"]);
  //   $chk=1;
  
  // if (file_exists($target_file)) {
  //     echo "Certificate already exist";
  //     $chk = 0;
  //   }
  //   $ftypee = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  //   if($ftypee != "jpg" && $ftypee != "png" && $ftypee != "jpeg" ) {
  //     echo "$ftypee is not allowed.Only jpeg,png,jpg is accepted";
  //     $chk = 0;
  //   }
  
  //   if ($chk == 1) {
  //     if (move_uploaded_file($_FILES["ftu"]["tmp_name"], $target_file)) {
  //         echo "The Image ". htmlspecialchars( basename( $_FILES["ftu"]["name"])). " has been uploaded.";
  //         $img=$target_file;

  //       } else {
  //         echo "Error in uploading the Image!!!";
  //       }
  //   } else {
  //      echo 'File not uploaded';
  //   }
  $upload_dir1 = "mentor_cert/"; // folder to upload files for input field with name "files1[]"
  $upload_dir2 = "chat/php/images/"; // folder to upload files for input field with name "files2[]"

  
  
    // loop through each uploaded file for input field with name "files1[]"
    foreach($_FILES['files1']['tmp_name'] as $key => $tmp_name ){
        $file_name1 = $_FILES['files1']['name'][$key];
        $file_size1 = $_FILES['files1']['size'][$key];
        $file_tmp1 = $_FILES['files1']['tmp_name'][$key];
        $file_type1 = $_FILES['files1']['type'][$key];
  
        $file_path1 = $upload_dir1 . $file_name1;
        move_uploaded_file($file_tmp1, $file_path1);
    }
  
    // loop through each uploaded file for input field with name "files2[]"
    foreach($_FILES['files2']['tmp_name'] as $key => $tmp_name ){
        $file_name2 = $_FILES['files2']['name'][$key];
        $file_size2 = $_FILES['files2']['size'][$key];
        $file_tmp2 = $_FILES['files2']['tmp_name'][$key];
        $file_type2 = $_FILES['files2']['type'][$key];
  
        $file_path2 = $upload_dir2 . $file_name2;
        move_uploaded_file($file_tmp2, $file_path2);
    }



//     $sql="SELECT * from mentor";
//     $res=$conn->prepare($sql);
//     $res->execute();
//     // $res=mysqli_query($conn,$sql);
//    $id=$res->rowCount();
$id=$reg;


    
    $sql="INSERT INTO mentor( mid,fname, email,dept,batch, phone, company, design, exp, pass, linkedin, certificate, photo) 
    VALUES ('$id','$fname','$email','$dept','$batch','$phone','$company','$design','$exp','$pass','$linkedin','$file_path1','$file_path2')";
    // $res=mysqli_query($conn,$sql);
    $res=$conn->prepare($sql);
    $res->execute();
    if($res){
        session_start();
        $_SESSION['mid']=$id;
        $_SESSION['fname']=$fname;
        $_SESSION['email']=$email;
        $_SESSION['dept'] = $dept;
        $_SESSION['batch'] = $batch;
        $_SESSION['phone']=$phone;
        $_SESSION['company']=$company;
        $_SESSION['design']=$design;
        $_SESSION['exp']=$exp;
        $_SESSION['linkedin']=$linkedin;
        // $_SESSION['gender']=$gender;
        
    $_SESSION['emailuuuu']=$email;
    $_SESSION['passworduuuu']=$pass;
    $conios=mysqli_connect('localhost','root',"",'chatapp');
    $pasu=md5($pass);
    $ran_id = rand(time(), 100000000);
    $sqli="INSERT INTO users(unique_id, fname, lname, email, password, img, status) VALUES ('$ran_id','$fname',' ','$email','$pasu','$file_name2','Offline now')";
    $res=mysqli_query($conios,$sqli);

        header('location:dashal.php');
    }else{
        echo "<script>alert('Registration unsuccessful'); </script>";
      header('location:mentor_reg.php');
        
    }
}




            






  


?>