<?php
 include ('includes/header.php');
//  include('includes/navbar.php');
 include('includes/db-connection.php');
 require_once('functions/get-projects.php');
?>

<?php
// session_start(); //starts the session
// if ($_SESSION['email']) { //checks if name is logged in
// } else {
//     header("location:index.php"); // redirects if name is not logged in
// }
// $email = $_SESSION['email']; //assigns name value
?>

 <body>
    <form action="project-datails.php" method="post" enctype="multipart/form-data">
        <div style="padding:10px 20px;">
        <h3>ADD INFO</h3>
        <label for='title' class='control-label'>Title:</label>
        <input name='title' value='' placeholder='Enter project Title' data-theme='a' type='text'>

        <label for='description' class='control-label'>Username:</label>
        <input name='description' value='' placeholder='Enter Description' data-theme='a' type='text'>

        <label for='amountNeeded' class='control-label'>Amount Needed:</label>
        <input name='amountNeeded' value='' placeholder='Enter amount required' data-theme='a' type='text'>
        
        <label for='consultancyNeeded' class='control-label'>Consultancy Needed:</label>
        <input name='consultancyNeeded' value='' placeholder='Enter type of Consultancy' data-theme='a' type='text'>

        <input type="file" name="image" accept="image/*" />

        <button type="submit" name="Submit">ADD PROJECT</button>
        
        <script>
        document.getElementById("submitBtn").addEventListener("click", myFunction);
        function myFunction() {
            window.location.href="http://localhost/index.php";
        }
  </script> 
        </div>
    </form>
    <?php include("includes/footer.php")?>
</body>
