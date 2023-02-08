<?php
session_start();
$id;
if(isset($_SESSION["userID"])){
    $id = $_SESSION["userID"];
}
?>

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./assets/images/logo.png" alt="Fundy logo" width="150" height="90" style="position: absolute; left:20%; top:3%"></img></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                </a>
            </li> 

            <li class="nav-item"><a class="nav-link" href="projects.php?page=1">Projects</a></li>

            <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="team.php">Team</a>
                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                </div>
            </li>
            
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            <?php
                // false só para testar enquanto não existe a variável de sessão
                if($_SESSION['isLoggedIn']){
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="user-profile.php?id='.$id.'">Profile</a></li>';
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="logout.php">Logout</a></li>';
                }else{
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="login.php">Sign in</a></li>';
                    echo '<li class="nav-item nav-item-auth"><a class="nav-link" href="registration.php">Sign up</a></li>';
                }
            ?>
            
        </ul>
        </div>
    </div>
    </nav>
</header>
