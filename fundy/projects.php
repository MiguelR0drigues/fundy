<?php
 include ('includes/header.php');
 include('includes/preloader.php');
 include('includes/navbar.php');
 include('includes/db-connection.php');
 require_once('functions/get-projects.php');
 include('functions/isAccountReady.php');
 isAccountReady();
 $per_page = 8;
  if(!isset($_GET['page'])) {
    $current_page = 1;
  }else {
    $current_page = intval($_GET['page']);
  }
 $projects_data = getProjects($conn, $current_page, $per_page);
 $projects = $projects_data['result'];
 $total_projects = $projects_data['total'];
 $total_pages = ceil($total_projects / $per_page);
        
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
             <!-- <div class="contact-form">
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

                           <small>Accounting</small>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>Finance</small>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <small>IT</small>
                      </label>
                 </div>

                 <br>
              </form>
             </div> -->
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
              echo '<a href="job-details.php?id='.$project["id"].'"><img src="assets/images/projects/'.$project["mainImg"].'" alt="Main project image" style="object-fit:cover;width:370px;height:270px;"></a>';
                  echo '<div class="down-content">';
                  echo '<a href="job-details.php?id='.$project["id"].'"><h4>'.$project["title"].'</h4></a>';

                  echo '<h6>Looking for: <strong style="color:#00c389">'.$ask.'</strong></h6>';

                  echo '<h4><small><i class="fa fa-briefcase"></i>  '.$project["category"] .'</small></h4>';

                  echo '<small>';
                  echo '<strong title="Posted on"><i class="fa fa-calendar"></i>  '. date("d.m.Y", strtotime($project["createdAt"])).'</strong> &nbsp;&nbsp;&nbsp;&nbsp;' ;
                  // echo '<strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;';
                  echo '<strong title="Location"><i class="fa fa-map-marker"></i> '.$project["Location"].'</strong>';
                  echo '</small>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
            }
          ?>
          <!-- TODO: Handle pagination -->
              <div class="col-md-12">
                <ul class="pages">
                    <li><a href="#" id="first-page" onclick="goToPage(1)"><<</a></li>
                    <li><a href="#" id="prev-page" onclick="goToPage(<?php echo $current_page-1; ?>)"><</a></li>
                    <?php
                    for($i = 1; $i <= $total_pages; $i++) {
                        if($i === $current_page) {
                            echo '<li class="active"><a href="#">'.$i.'</a></li>';
                        } else {
                            echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                        }
                    }
                    ?>
                    <li><a href="#" id="next-page" onclick="goToPage(<?php echo $current_page+1; ?>)">></a></li>
                    <li><a href="#" id="last-page" onclick="goToPage(<?php echo $total_pages; ?>) ">>></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script>
    function goToPage(page) {
        if(page < 1 || page > <?php echo $total_pages; ?>) {
            return;
        }
        window.location.href = "?page=" + page;
    }
  </script>

  
<?php
 include('includes/footer.php');
?>
</html>