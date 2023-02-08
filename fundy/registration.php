<?php

 include ('includes/header.php');
//  include('includes/preloader.php');
 include('includes/navbar.php');
 include('includes/db-connection.php');

session_start();
isAccountReady();

if(isset($_GET["error"]) && $_GET["error"] == 1){
    echo "<script type='text/javascript'>toastr.error('All fields are required!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 2){
    echo "<script type='text/javascript'>toastr.error('Email isn't valid!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 3){
    echo "<script type='text/javascript'>toastr.error('Passwords must be 8 characters long!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 4){
    echo "<script type='text/javascript'>toastr.error('Passwords dont match!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 5){
    echo "<script type='text/javascript'>toastr.error('Email already exists!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 6){
    echo "<script type='text/javascript'>toastr.error('Sign up failed!')</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];
    $counter=0;
    $switch =0;

    if(isset($_POST["switch-btn"])){
        $switch = 1;
    }

    if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) { //err 1
        header("Location: registration.php?error=1");
        
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // err 2
        header("Location: registration.php?error=2");
        
    }
    if (strlen($password)<8) { // err 3
        header("Location: registration.php?error=3");
    }
    if ($password!==$passwordRepeat) { //err 4
        header("Location: registration.php?error=4");
    }
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount>0) { // err 5
        header("Location: registration.php?error=5");
    }
     $sql = "INSERT INTO users (`name`, `email`, `password`,`type`, `isVerified`) VALUES ( ?, ?, ?,?,0)";
     $stmt = mysqli_stmt_init($conn);
     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
     if ($prepareStmt) {
         mysqli_stmt_bind_param($stmt,"sssi",$fullName, $email, $password,$switch);
         mysqli_stmt_execute($stmt);
         header("Location: login.php");
     }else{
        header("Location: registration.php?error=6");
     }
 }
?>
<body>
    <div class="container">
      <div class="d-flex flex-column register-info">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
          enctype="multipart/form-data">    
          <img src="assets/images/logo.png" alt="Fundy logo" width="300" height="200">
          <h1>Sign Up</h1>
          <div class="group">
            <input type="text" name="fullname" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Full name</label>
          </div>

          <div class="group">
            <input type="email" name="email" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
          </div>
          <div class="group">
            <input type="password" name="password" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Password</label>
          </div>
          <div class="group">
            <input type="password" name="repeat_password" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Confirm Password</label>
          </div>
          <div class="switch-btn">
            <label>Entrepreneur</label>
            <label class="switch">
                <input type="checkbox" name="switch-btn">
                <span class="slider round"></span>
            </label>
            <label>Business Angel</label>
          </div>
          
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>

    <style>

        .switch-btn{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .container{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 13vh;
        }
        form{
            margin-top: 9vh;
            background-color: white;
            padding: 50px;
            border-radius: 45px;
            box-shadow: -1px -1px 127px -8px rgba(0,103,161,0.73);
            -webkit-box-shadow: -1px -1px 127px -8px rgba(0,103,161,0.73);
            -moz-box-shadow: -1px -1px 127px -8px rgba(0,103,161,0.73);
        }
        body{
            background-color: rgb(266,266,266);
        }
        /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        margin: 20px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        z-index: 1;
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #0067a1;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #00c389;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #00c389;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>
</body>
<?php
 include('includes/footer.php');
?>
</html>