<?php
 include('includes/db-connection.php');
 require_once('functions/get-projects.php');
 include 'includes/header.php';
 include 'includes/preloader.php';
 include 'includes/navbar.php';

 if(isset($_GET["success"]) && $_GET["success"]==1){
    echo "<script type='text/javascript'>toastr.options.closeButton = true;toastr.success('Update Successful!')</script>";
  }
?> 


  <link rel="stylesheet" href="assets/css/style.css">

 <!-- <div class="container">
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
</div> -->

    <div class="container">
      <div class="d-flex flex-column register-info">
        <form action="functions/add-project-details.php?id=<?php echo $_SESSION['userID'] ?>" method="post"
          enctype="multipart/form-data">    
          <img src="assets/images/logo.png" alt="Fundy logo" width="300" height="200">
          <h1>Add Your Company</h1>
          <div class="group">
            <input type="text" name="title" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Title</label>
          </div>

          <div class="group">
            <input type="text" name="description" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Description</label>
          </div>

          <div class="switch-btn">
            <label>Need Financing?</label>
            <label class="switch">
                <input type="checkbox" name="isAmount" id="isAmount">
                <span class="slider round"></span>
            </label>
            <label>Need Consultancy?</label>
            <label class="switch">
                <input type="checkbox" name="isConsultancy" id="isConsultancy">
                <span class="slider round" for="isConsultancy"></span>
            </label>
          </div>

          <div id="optionsContainer" style="display: none;">
            <div class="group" id="group1">
              <input type="number" name="amountNeeded">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Amount Needed</label>
            </div>
            <div class="group" id="group2">
              <input type="text" name="consultancyNeeded">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Consultancy Needed</label>
            </div>
          </div>

            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
              <label class="custom-file-label" for="customFile">Upload an image</label>
            </div>
          
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
    <script>
      const isAmount = document.getElementById("isAmount");
      const isConsultancy = document.getElementById("isConsultancy");
      const optionsContainer = document.getElementById("optionsContainer");
      const group1 = document.getElementById("group1");
      const group2 = document.getElementById("group2");
      const amountInput = document.querySelector("#group1 input");
      const consultancyInput = document.querySelector("#group2 input");

      isAmount.addEventListener("change", function() {
        if (isAmount.checked) {
          optionsContainer.style.display = "flex";
          group1.style.display="block";
          amountInput.required = true;
        } else {
          group1.style.display = "none";
          amountInput.required = false;
          if (!isConsultancy.checked) {
            optionsContainer.style.display = "none";
          }
        }
      });

      isConsultancy.addEventListener("change", function() {
        if (isConsultancy.checked) {
          optionsContainer.style.display = "flex";
          group2.style.display="block";
          consultancyInput.required = true;
        } else {
          group2.style.display = "none";
          consultancyInput.required = false;
          if (!isAmount.checked) {
            optionsContainer.style.display = "none";
          }
        }
      });
    </script>
    <style>
      div.custom-file{
        margin: 20px;
      }
        #optionsContainer{
          display: none;
          flex-direction: row;
          flex-wrap: wrap;
          gap:10px;
          width: 100%;
        }

        #optionsContainer>.group{
          display: none;
          width: 48%;
        }
        .form-check{
            position: inherit;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            width: 100%;
            gap:20px;
        }

        .form-check-label{
          margin-left:-15px;
        }
        .form-check-input{
          position: relative;
          margin:10px;
        }
        .container{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 13vh;
        }
        form{
            margin-top: 10vh;
            background-color: white;
            padding: 50px;
            border-radius: 45px;
            box-shadow: 16px 14px 101px -4px rgba(0,0,0,0.66);
            -webkit-box-shadow: 16px 14px 101px -4px rgba(0,0,0,0.66);
            -moz-box-shadow: 16px 14px 101px -4px rgba(0,0,0,0.66);
        }

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

        .switch-btn{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
    </style>
<?php include("includes/footer.php")?>