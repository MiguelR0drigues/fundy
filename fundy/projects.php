<?php
 include ('includes/header.php');
//  include('includes/preloader.php');
 include('includes/navbar.php');
 include('includes/db-connection.php');
 require_once('functions/get-projects.php');
$projects = getProjects($conn);

?>


  <body>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Sometimes GUIDANCE is all it needs</h4>
              <h2>Projects</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- TODO: Filter needs to be done -->
    <!-- Filter -->
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
             <div class="contact-form">
                <form action="#">
                 <h5 style="margin-bottom: 15px">Type</h5>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>Financing</small>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>Consultancy</small>
                      </label>
                 </div>

                 <br>

                 <h5 style="margin-bottom: 15px">Category</h5>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>Accounting / Finance / Insurance Jobs (5)</small>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>Accounting / Finance / Insurance Jobs (5)</small>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>Accounting / Finance / Insurance Jobs (5)</small>
                      </label>
                 </div>

                 <br>
              </form>
             </div>
          </div>
          <!-- End Filter -->
          <!-- Content -->

          <div class="col-md-9">
            <div class="row">
            <?php
            foreach($projects as $project){
              $ask="";
              if($project["amountNeeded"] && !$project["consultancyNeeded"]){
                $ask="Financing";
              }elseif($project["consultancyNeeded"] && !$project["amountNeeded"]){
                $ask="Consultancy";
              }elseif($project["consultancyNeeded"] && $project["amountNeeded"]){
                $ask="Financing and Consultancy";
              }


              echo  '<div class="col-md-6">';
              echo '<div class="product-item">';
              echo '<a href="job-details.php"><img src="assets/images/projects/'.$project["mainImg"].'" alt="Main project image"></a>';
                  echo '<div class="down-content">';
                  echo '<a href="job-details.php"><h4>'.$project["title"].'</h4></a>';

                  echo '<h6>Looking for: <strong style="color:#00c389">'.$ask.'</strong></h6>';

                  echo '<h4><small><i class="fa fa-briefcase"></i>  '.$project["category"] .'</small></h4>';

                  echo '<small>';
                  echo '<strong title="Posted on"><i class="fa fa-calendar"></i>  '. date("d.m.Y", strtotime($project["createdAt"])).'</strong> &nbsp;&nbsp;&nbsp;&nbsp;' ;
                  // echo '<strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;';
                  echo '<strong title="Location"><i class="fa fa-map-marker"></i> Location</strong>';
                  echo '</small>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
            }
          ?>
          <!-- TODO: Handle pagination -->
              <div class="col-md-12">
                <ul class="pages">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  
<?php
 include('includes/footer.php');
?>
</html>