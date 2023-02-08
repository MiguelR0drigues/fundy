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

 <div class="container">
    <h2>ADD INFO</h2>
    <form class="form-horizontal" action="project-datails.php" method="post" enctype="multipart/form-data">
        <div class="form-group" style="padding:10px 20px;">
            <label for='title' class='control-label col-sm-2 col-sm-2'>Title:</label>
            <div class="col-sm-10">
                <input name='title' class ="form-control" value='' placeholder='Enter project Title' data-theme='a' type='text'>
            </div>
        </div>

        <div class="form-group" style="padding:10px 20px;">
            <label for='description' class='control-label col-sm-2'>Username:</label>
            <div class="col-sm-10">
                <input name='description' class ="form-control" value='' placeholder='Enter Description' data-theme='a' type='text'>
            </div>
        </div>

         <div class="form-group" style="padding:10px 20px;">
            <label for='amountNeeded' class='control-label col-sm-2'>Amount Needed:</label>
            <div class="col-sm-10">
                <input name='amountNeeded' class ="form-control" value='' placeholder='Enter amount required' data-theme='a' type='text'>
            </div>
        </div>  
         <div class="form-group" style="padding:10px 20px;">
            <label for='consultancyNeeded' class='control-label col-sm-2'>Consultancy Needed:</label>
            <div class="col-sm-10">
                <input name='consultancyNeeded' class ="form-control" value='' placeholder='Enter type of Consultancy' data-theme='a' type='text'>
            </div>
        </div>
         <div class="form-group" style="padding:10px 20px;">
            <input type="file" name="image" accept="image/*" />
        </div>
         <div class="form-group" style="padding:10px 20px;">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="Submit">ADD PROJECT</button>
            </div>
        <script>
        document.getElementById("submitBtn").addEventListener("click", myFunction);
        function myFunction() {
            window.location.href="http://localhost/index.php";
        }
        </script> 
        </div>
    </form>
    <?php include("includes/footer.php")?>
</div>
