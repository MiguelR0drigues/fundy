<?php
 include ('includes/header.php');
 include('includes/preloader.php');
 include('includes/navbar.php');
 include('includes/db-connection.php');
 include('functions/isAccountReady.php');
 include('functions/get-project-info.php');
 include('functions/get-user-info.php');

 isAccountReady();

 $projectId = $_GET["id"];
 $queryResult = getProjectById($projectId,$conn);
 $project = mysqli_fetch_assoc($queryResult);
 $queryResult = getUSerInfoById($project["ownerId"],$conn);
 $owner = mysqli_fetch_assoc($queryResult);

 if(isset($_GET["error"]) && $_GET["error"]==1){
  echo "<script type='text/javascript'>toastr.options.closeButton = true;toastr.error('Already invested in this company!')</script>";
 }

?>

<body>
  <!-- Page Content -->
  <div class="page-heading about-heading header-text"
    style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">

            <h2><?php echo $project["title"]?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <p class="lead">
            <i class="fa fa-map-marker"></i> <?php echo $project["location"] ?>
            <i class="fa fa-calendar"></i> <?php echo date("Y-m-d", strtotime($project["createdAt"])) ?>
            <i class="fa fa-file"></i> <?php echo $project["category"] ?>
          </p>

          <br>
          <br>

          <div class="form-group">
            <h5>Get to know this project</h5>
          </div>

          <p style="text-align: justify;"><?php echo $project["description"] ?>
          </p>

          <br>
          <br>
        </div>

        <div class="col-md-3 col-sm-4">
          <div class="contact-form">
            <div class="form-group">
              <button type="submit" data-toggle="modal" data-target="#exampleModal" class="filled-button btn-block"
                <?php if($_SESSION["user_type"] == 0){ ?> disabled <?php }?>>Invest now</button>
            </div>
          </div>

          <div>
            <img src="assets/images/projects/<?php echo $project["mainImg"]; ?>" alt="Project image"
              class="img-fluid wc-image">
          </div>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="section-heading">
            <h2>What is '<?php echo $project["title"] ?>' looking for?</h2>
          </div>
          <?php 
                if($project["amountNeeded"] != null && $project["amountNeeded"] > 0){ ?>
          <p class="lead">
            <i class="fa fa-solid fa-money"></i> Financial Help
          </p>

          <p>They are looking for an amount of <stong style="font-size: 16px; font-weight:bold">
              <?php echo $project["amountNeeded"] ."€"; ?></stong>.</p>
          <br>
          <?php  }
              if($project["consultancyNeeded"] != null && $project["consultancyNeeded"] != ""){ ?>
          <p class="lead">
            <i class="fa fa-solid fa-thumbs-up"></i> Consultancy
          </p>
          <p>They are looking for consultancy with <stong style="font-size: 16px; font-weight:bold">
              <?php echo $project["consultancyNeeded"]; ?></stong>.</p>

          <?php  } ?>
        </div>
        <div class="col-md-3">
          <div class="section-heading">
            <h2>Contact Details</h2>
          </div>

          <div class="left-content">
            <p>
              <span>Name</span>

              <br>

              <strong><?php echo $owner["name"] ?></strong>
            </p>

            <p>
              <span>Phone</span>

              <br>

              <strong>
                <a href="tel:123-456-789">123-456-789</a>
              </strong>
            </p>

            <p>
              <span>Mobile phone</span>

              <br>

              <strong>
                <a href="tel:456789123">456789123</a>
              </strong>
            </p>

            <p>
              <span>Email</span>

              <br>

              <strong>
                <a href="mailto:<?php echo $owner["email"] ?>"><?php echo $owner["email"] ?></a>
              </strong>
            </p>

            <p>
              <span>Website</span>

              <br>

              <strong>
                <a href="http://www.cannonguards.com/">http://www.cannonguards.com/</a>
              </strong>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Invest Now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="contact-form">
            <form
              action="actions/invest-action.php?id_project=<?php echo $projectId ?>&id_user=<?php echo $_SESSION["userID"] ?>"
              method="post" id="contact">

              <input type="text" class="form-control" placeholder="Enter full name" required="" name="name">

              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <input type="email" class="form-control" placeholder="Enter email address" required="" name="email">
                  </fieldset>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="number" class="form-control" placeholder="Amount offered (if any)"
                      name="amountOffered">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Consultancy offered (if any)"
                      name="consultancyOffered">
                  </fieldset>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Invest Now</button>
              </div>
            </form>
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