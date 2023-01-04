<?php

include 'functions/get-user-info.php';
include 'includes/db-connection.php';

include 'includes/header.php';
include 'includes/preloader.php';
include 'includes/navbar.php';

$userId = $_GET['id'];
$queryResult = getUSerInfoById($userId,$conn);
$userInfo = mysqli_fetch_assoc($queryResult);
$_SESSION["id"]=1; // TODO: Remove this when login is done

// TODO: Make responsive
// if($_SESSION["id"] != $_GET["id"] || !$_SESSION["isLoggedIn"]){
//   header("Location: login.php");
// }

if(isset($_GET["error"]) && $_GET["error"]==1){
  echo "<script type='text/javascript'>toastr.error('Passwords dont match!')</script>";
}
if(isset($_GET["error"]) && $_GET["error"]==2){
  echo "<script type='text/javascript'>toastr.error('Cannot update to the current password!')</script>";
}
if(isset($_GET["success"]) && $_GET["success"]==1){
  echo "<script type='text/javascript'>toastr.options.closeButton = true;toastr.success('Update Successful!')</script>";
}

?>
<main class="row container-fluid col-12">
  <article class="container user-profile-page col-12 d-flex justify-content-center text-center">
    <section class="personal-info-container d-flex flex-row">
      <div class="d-flex flex-row">
        <div class="profile-picture">
          <img src="assets/images/user-pfp/<?php echo $userInfo["pfp"];?>" alt="Profile Picture" id="pfp">
          <div class="upload-indicator">
            <form action="actions/upload-photo-action.php?id=<?php echo $userId?>" method="post" enctype="multipart/form-data">
              <input type="file" name="new-profile-picture" id="new-profile-picture" onchange="this.form.submit()">
              <label for="new-profile-picture">Click to upload new photo</label>
            </form>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column personal-information">
        <form action="actions/personal-info-change-action.php?id=<?php echo $userId?>" method="post" enctype="multipart/form-data">
          <h1>Personal information</h1>
          <div class="group">      
            <input type="text" value="<?php echo $userInfo["name"]?>" name="inpName" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Name</label>
          </div>
          
          <div class="group">      
            <input type="text" value="<?php echo $userInfo["email"]?>" name="inpEmail" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
          </div>
          <input type="submit" value="Update">
        </form>
        <form action="actions/password-change-action.php?id=<?php echo $userId?>" method="post" enctype="multipart/form-data">
          <h1>Reset Password</h1>
          <div class="group">      
            <input type="password" name="pw" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>New Password</label>
          </div>
          <div class="group">      
            <input type="password"name="confirmPw" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Confirm Password</label>
          </div>
          <input type="submit" value="Reset">
        </form>
      </div>
    </section>
  </article>
</main>

<?php
include 'includes/footer.php';
?>