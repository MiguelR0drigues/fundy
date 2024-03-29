<?php
include('includes/header.php');
include('includes/preloader.php');
include('includes/navbar.php');
include('includes/db-connection.php');
include('functions/get-investments.php');

$userId = $_GET["id"];
$projects_data = getInvestments($userId,$conn);
$projects = $projects_data;

if(isset($_GET["success"]) && $_GET["success"]==1){
  echo "<script type='text/javascript'>toastr.options.closeButton = true;toastr.success('Investment Successful!')</script>";
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />
<link rel="stylesheet" href="assets/css/tables.css">
<div class="container table-container">
            <div class="row">
                 <div class="col-lg-10 mx-auto mb-4">
                    <div class="section-title text-center ">
                        <h3 class="top-c-sep" style="color:#0067a1">Your investments</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">
                        <div class="filter-result">
                          <?php
                          if (!isset($projects) || empty($projects)){
                            ?> <p style="text-align: center; padding: 30px; padding-bottom:0;">No investments found.</p>
                            <?php
                          }else{
                            foreach($projects as $project){
                            ?>
                              <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                    <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                        <a href="job-details.php?id=<?php echo $project["project_id"] ?>"><img src="assets/images/projects/<?php echo $project["image"] ?>" alt="Project Image" style="width:80px;height:80px;border-radius:100%;"></a>
                                    </div>
                                    <div class="job-content">
                                        <h5 class="text-center text-md-left"><a href="job-details.php?id=<?php echo $project["project_id"] ?>"><?php echo $project["title"] ?></a></h5>
                                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                            <li class="mr-md-4">
                                                <i class="zmdi zmdi-pin mr-2"></i> <?php echo $project["location"] ?>
                                            </li>
                                            <?php if($project["givenAmount"] != null && $project["givenAmount"]!=""){
                                            ?>
                                              <li class="mr-md-4">
                                                <i class="zmdi zmdi-money mr-2"></i> <?php echo $project["givenAmount"] ?>
                                              </li>
                                           <?php } ?>
                                            <?php if($project["givenConsultancy"] != null && $project["givenConsultancy"]!=""){
                                            ?>
                                              <li class="mr-md-4">
                                                <i class="zmdi zmdi-time mr-2"></i> <?php echo $project["givenConsultancy"] ?>
                                              </li>
                                           <?php } ?>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-right my-4 flex-shrink-0">
                                    <a href="actions/delete-investment-action.php?user_id=<?php echo $userId; ?>&project_id=<?php echo $project["project_id"]; ?>" class="btn d-block w-100 d-sm-inline-block btn-light"><i class="fa fa-solid fa-trash" style="font-size: 28px; color:red"></i></a>
                                </div>
                            </div>
                          <?php
                            }
                          }
                          ?>

                        </div>
                    </div>
                  <?php 
                  if(!isset($projects) || empty($projects)){ ?>
                    <a href="projects.php" style="text-align: center; padding: 10px;"><p style="color:#0067a1; text-decoration:underline">Start investing now!</p></a>
                <?php }else{
                     ?>
                    <!-- START Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-reset justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="zmdi zmdi-long-arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item d-none d-md-inline-block"><a class="page-link" href="#">2</a></li>
                            <li class="page-item d-none d-md-inline-block"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="zmdi zmdi-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END Pagination -->
                  <?php } ?>
                </div>
            </div>

        </div>

<?php 
include('includes/footer.php');
?>