<?php
 include ('includes/header.php');
 include('includes/preloader.php');
 include('includes/navbar.php');
 include('functions/isAccountReady.php');
 isAccountReady();

?>
 
  <body>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Find the perfect business partner with our web platform!</h4>
            <h2>Connect, Collaborate, Succeed</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Join the Community of Passionate Entrepreneurs and Investors</h4>
            <h2 style="color:#0067a1">Grow your ideas and investments</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Discover the power of connection and collaboration in entrepreneurship</h4>
            <h2 style="color:#0067a1">Turn Your Dreams into Reality with Fundy</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Jobs</h2>
              <a href="projects.php">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="job-details.php?id=16"><img src="assets/images/projects/16.jpg" alt="Company logo"></a>
              <div class="down-content">
                <a href="job-details.php?id=16"><h4>Medical Company</h4></a>

                <h6>Looking for: <strong style="color:#00c389">Consultancy</strong></h6>

                <h4><small><i class="fa fa-briefcase"></i> Medical / Health</small></h4>

                <small>
                     <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                     <strong title="Location"><i class="fa fa-map-marker"></i> Private</strong>
                </small>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="job-details.php?id=15"><img src="assets/images/projects/15.jpg" style="height:232px; object-fit:cover" alt="Company logo"></a>
              <div class="down-content">
                <a href="job-details.php?id=15"><h4>IT Company</h4></a>

                <h6>Looking for: <strong style="color:#00c389">Financing and Consultancy</strong></h6>

                <h4><small><i class="fa fa-briefcase"></i> IT</small></h4>

                <small>
                     <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                     <strong title="Location"><i class="fa fa-map-marker"></i> Private</strong>
                </small>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="job-details.php?id=17"><img src="assets/images/projects/17.jpg" alt="Company logo"></a>
              <div class="down-content">
                <a href="job-details.php?id=17"><h4>Marketing Company</h4></a>

                <h6>Looking for: <strong style="color:#00c389">Financing</strong></h6>

                <h4><small><i class="fa fa-briefcase"></i> Marketing</small></h4>

                <small>
                    <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong title="Location"><i class="fa fa-map-marker"></i> Private</strong>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p style="text-align:justify;">At Fundy, our mission is to provide a solution for entrepreneurs and investors to connect and collaborate. Our web platform is designed to bridge the gap between entrepreneurs with big ideas and investors who are looking for their next great investment opportunity. Our goal is to help entrepreneurs turn their dreams into a reality and create a thriving community of people who are passionate about helping each other succeed. With our platform, entrepreneurs and investors can connect, discuss projects, and explore ways to work together to achieve their goals. So if you're an entrepreneur with a great idea or an investor who wants to make a difference, join us at Fundy and let's make it happen.</p>
              <a href="about-us.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/about-1-570x350.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Happy Clients</h2>

              <a href="testimonials.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Annalise Lam</h4>
                  <h6 style="font-size: 10px; color:gray">Business Angel</h6>
                  <p class="n-m"><em>"Thanks guys, keep up the good work!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Khadija Pace</h4>
                  <h6 style="font-size: 10px; color:gray">Entreprenuer (Prodox)</h6>
                  <p class="n-m"><em>"Just what I was looking for. I don't know what else to say. It really saves me time and effort. Fundy is exactly what our business has been lacking. Fundy should be nominated for service of the year."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Junaid Day</h4>
                  <h6 style="font-size: 10px; color:gray">Entreprenuer (Techino)</h6>
                  <p class="n-m"><em>"Thank You! Without Fundy, we would have gone bankrupt by now. After using Fundy my business skyrocketed!"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Ray Morrow</h4>
                  <h6 style="font-size: 10px; color:gray">Business Angel</h6>
                  <p class="n-m"><em>"I was amazed at the quality of Fundy. I like Fundy more and more each day because it makes my life a lot easier."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Anas Shaffer</h4>
                  <h6 style="font-size: 10px; color:gray">Entreprenuer (Locksuit)</h6>
                  <p class="n-m"><em>"We've used Fundy for the last five years. I will recommend you to my colleagues."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Will Clarke</h4>
                  <h6 style="font-size: 10px; color:gray">Entreprenuer (Klinery)</h6>
                  <p class="n-m"><em>"Fundy is great. Very easy to use. It's incredible."</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Is there any question left to be answered?</h4>
                  <p>Don't be shy, contact us! Our team is always available to help!</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.php" class="filled-button">Contact Us</a>
                </div>
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