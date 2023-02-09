<?php
 include('includes/db-connection.php');
 require_once('functions/get-projects.php');
 include 'includes/header.php';
 include 'includes/preloader.php';
 //include 'includes/navbar.php';

 if(isset($_GET["success"]) && $_GET["success"]==1){
    echo "<script type='text/javascript'>toastr.options.closeButton = true;toastr.success('Update Successful!')</script>";
  }
?> 

<html>
<head>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
 <div class="container">
    <h2 style="color:#00c389;font-size: 50px;text-align: center">ADD INFO</h2>
    <form class="form-horizontal" action="functions/add-project-details.php" method="post" enctype="multipart/form-data">
        <div class="form-group" style="padding:10px 20px;">
            <label for='title' class='control-label col-sm-2 col-sm-2' style="color: #00c389">Title:</label>
            <div class="col-sm-10">
                <input name='title' class ="form-control" value='' placeholder='Enter project Title' data-theme='a' type='text'>
                <span class="highlight"></span>
            </div>
        </div>

        <div class="form-group" style="padding:10px 20px;">
            <label for='description' class='control-label col-sm-2' style="color: #00c389" >Username:</label>
            <div class="col-sm-10">
                <input name='description' class ="form-control" value='' placeholder='Enter Description' data-theme='a' type='text'>
                <span class="highlight"></span>
            </div>
        </div>

         <div class="form-group" style="padding:10px 20px;">
            <label for='amountNeeded' class='control-label col-sm-2' style="color: #00c389">Amount Needed:</label>
            <div class="col-sm-10">
                <input name='amountNeeded' class ="form-control" value='' placeholder='Enter amount required' data-theme='a' type='text'>
                <span class="highlight"></span>
            </div>
        </div>  
         <div class="form-group" style="padding:10px 20px;">
            <label for='consultancyNeeded' class='control-label col-sm-2' style="color: #00c389">Consultancy Needed:</label>
            <div class="col-sm-10">
                <input name='consultancyNeeded' class ="form-control" value='' placeholder='Enter type of Consultancy' data-theme='a' type='text'>
                <span class="highlight"></span>
            </div>
        </div>
         <div class="form-group" style="padding:10px 20px;">
            <input type="file" name="image" accept="image/*" />
        </div>
        <input type="submit" value="ADD PROJECT">
        </div>
    </form>
    <?php include("includes/footer.php")?>
</div>
</html>