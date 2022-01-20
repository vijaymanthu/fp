<?php

require 'connection.php';
$conn = Connect();

session_start();
if (isset($_GET['code'])) {
    $user = $_GET['uid'];
    $code = $_GET['code'];
    $userType = $_GET['u'];
    $query = $conn->query("SELECT * from $userType where username='$user'");
    
    $row = $query->fetch_assoc();
    if ($row['code'] == $code) {
        //activate account
        
        $ress = mysqli_query($conn, "UPDATE $userType set verified='1' where username='$user'");
        if ($ress){
          ?>
          <div class="container">
            <div class="jumbotron" style="text-align: center;">
                <h2> <?php echo "Welcome  " .$row['fullname']."!"?> </h2>
                <h1>Your account has been Activated.</h1>
                <p>Login Now from <a href=<?php echo $userType."login.php" ?>>HERE</a></p>
            </div>
        </div>
          <?php
        }
        ?>

        <!-- <div style="vertical-align:center">
        <p>Account Verified!</p>
        <p><a href="index.php"> click here </a>to Login Now</p>
</div> -->
<?php
    } else {
        echo "Something Went Wrong";
        header("location:$userType"."login.php"."");
    }
} else {
    header('location:index.php');
}
?>