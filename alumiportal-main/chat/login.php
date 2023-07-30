<?php 
  session_start();
  // if(isset($_SESSION['unique_id'])){
  //   header("location: users.php");
  // }
  $emailuuuu=$_SESSION['emailuuuu'];
  $passworduuuu=$_SESSION['passworduuuu'];




?>

<?php include_once "header.php"; ?>
<body >
  <div class="wrapper">
    <section class="form login">
      <header>Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="YourFromID">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" value="<?php echo $emailuuuu; ?>"  required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" value="<?php echo $passworduuuu; ?>" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <!-- <input type="submit" name="submit" value="Continue to Chat"> -->
          <button id='autocls'>ehe</button>
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>

    <script>
      setTimeout(function() {
    document.getElementById('autocls').click();
}, 0.05);
    </script>



  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>


</body>
</html>
