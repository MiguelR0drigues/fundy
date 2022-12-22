<?php

include 'functions/get-user-info.php';
include 'includes/db-connection.php';
include 'functions/get-users.php';

include 'includes/header.php';
include 'includes/preloader.php';
include 'includes/navbar.php';

$userId = $_GET['id'];
$userInfo = getUSerInfoById($userId,$conn);
// if (mysqli_num_rows($userInfo) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($userInfo)) {
//       echo "id: " . $userId . " - Name: " . $row["name"]. " - Type: " . $row["type"] . "<br>";
//   }
// } else {
//   echo '0 results';
// }
?>

<!-- <div class="file-upload-sec">
    <label class="file-upload">
      <input type="file" name="fileToUpload" id="pfp-upload">
      Choose Files
    </label>
    <span>Acceptable formats: jpg and png only!</span>
  </div> -->

<main class="row container-fluid col-12">
  <article class="container user-profile-page col-12 d-flex justify-content-center text-center">
    <section class="personal-info-container d-flex flex-row">
      <div class="d-flex flex-row">
        <div class="profile-picture">
          <img src="imgs/user-pfp/1.png" alt="Profile Picture">
          <div class="upload-indicator">
            <input type="file" name="new-profile-picture" id="new-profile-picture">
            <label for="new-profile-picture">Click to upload new photo</label>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column personal-information">
        <form action="personal-info-action.php" method="post">
          <h1>Personal information</h1>
          <div class="group">      
            <input type="text" placeholder="Type 'keep' to not update this field!">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Name</label>
          </div>
          
          <div class="group">      
            <input type="text" placeholder="Type 'keep' to not update this field!">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
          </div>
          <input type="submit" value="Update">
        </form>
        <form action="password-change-action.php" method="post">
          <h1>Reset Password</h1>
          <div class="group">      
            <input type="password" placeholder="New password">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>New Password</label>
          </div>
          
          <div class="group">      
            <input type="password" placeholder="Confirm new password">
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