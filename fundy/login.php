<?php
include ('includes/header.php');
//  include('includes/preloader.php');
 include('includes/navbar.php');
 include('includes/db-connection.php');
 require_once('functions/get-projects.php');    
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<body class="">
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
        <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
      </form>
     
    </div>

    <style>
        .container{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        form{
            margin-top: 40vh;
        }
    </style>
</body>
<?php
 include('includes/footer.php');
?>
</html>