<?php
include ('includes/header.php');
 include('includes/preloader.php');
 include('includes/navbar.php');
 include('includes/db-connection.php');
 include('functions/isAccountReady.php');
session_start();
if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] ===true) {
   session_destroy();
}

if(isset($_GET["error"]) && $_GET["error"] == 1){
    echo "<script type='text/javascript'>toastr.error('Email or password incorrect!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 2){
    echo "<script type='text/javascript'>toastr.error('There is no account with this email!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"] == 3){
    echo "<script type='text/javascript'>toastr.error('Something went wrong!')</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT `id`,`name`, `email`, `type`,`isVerified`, `password` FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $name, $email, $type, $isVerified, $password_user,);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password == $password_user) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["isLoggedIn"] = true;
                            $_SESSION["userID"] = $id;
                            $_SESSION["user_email"] = $email;
                            $_SESSION["user_name"] = $name;
                            $_SESSION["user_type"] = $type;
                            $_SESSION["isVerified"] = $isVerified;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Password is not valid, display a generic error message
                            header("location: login.php?error=1");
                        }
                    }
                } else {
                    // email doesn't exist, display a generic error message
                    header("location: login.php?error=2");
                }
            } else {
                header("location: login.php?error=3");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo mysqli_error($link);
        } //echo "PREPARE STATEMENT::::::::::Oops! Something went wrong. Please try again later.";
    }
?>
<body>
    <div class="container">
      <div class="d-flex flex-column login-info">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
          enctype="multipart/form-data">    
          <img src="assets/images/logo.png" alt="Fundy logo" width="300" height="200">
          <h1>Sign In</h1>
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
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>

    <style>
        .container{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 13vh;
        }
        form{
            margin-top: 15vh;
            background-color: white;
            padding: 50px;
            border-radius: 45px;
            box-shadow: 16px 14px 101px -4px rgba(0,0,0,0.66);
            -webkit-box-shadow: 16px 14px 101px -4px rgba(0,0,0,0.66);
            -moz-box-shadow: 16px 14px 101px -4px rgba(0,0,0,0.66);
        }

        body{
            background-color: rgb(266,266,266);
        }
    </style>
</body>
<?php
 include('includes/footer.php');
?>
</html>