<?php

?>

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php"><h2><em>Fundy</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                </a>
            </li> 

            <li class="nav-item"><a class="nav-link" href="jobs.php">Jobs</a></li>

            <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>

            <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="team.php">Team</a>
                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                    <a class="dropdown-item" href="terms.php">Terms</a>
                </div>
            </li>
            
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            <?php
                // false só para testar enquanto não existe a variável de sessão
                if($_SESSION['isLoggedIn'] ?? false){
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="user-profile.php">Profile</a></li>';
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="logout.php">Logout</a></li>';
                }else{
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="login.php">Sign in</a></li>';
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="register.php">Sign un</a></li>';
                }
            ?>
            
        </ul>
        </div>
    </div>
    </nav>
</header>
