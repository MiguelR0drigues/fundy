<?php
session_start();
if(isset($_SESSION["userID"])){
    $id = $_SESSION["userID"];
    $name = $_SESSION["user_name"];
}
?>

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./assets/images/logo.png" alt="Fundy logo" width="150" height="90" style="position: absolute; left:10%; top:0%"></img></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                </a>
            </li> 

            <li class="nav-item"><a class="nav-link" href="projects.php?page=1">Companies</a></li>

            <li class="nav-item"><a class="nav-link" href="about-us.php">About us</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="team.php"><i class="fa fa-users" aria-hidden="true"></i>     Team</a>
                    <a class="dropdown-item" href="testimonials.php"><i class="fa fa-comments"></i>  Testimonials</a>
                </div>
            </li>
            
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            <?php
                // false só para testar enquanto não existe a variável de sessão
                if(isset($_SESSION['isLoggedIn'])){
                    echo '<li class="nav-item dropdown">';
                       echo' <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="user-profile.php?id='.$id.'" role="button" aria-haspopup="true" aria-expanded="false">'.$name.'</a>';
                        
                        echo '<div class="dropdown-menu">';
                            echo '<a class="dropdown-item" href="user-profile.php?id='.$id.'"><i class="fa fa-user" aria-hidden="true"></i>  Profile Page</a> ';
                            if($_SESSION["user_type"] == 0){
                                echo '<a class="dropdown-item" href="add-project.php?id='.$id.'"><i class="fa fa-plus" aria-hidden="true"></i>  Publish your startup</a> ';
                                echo '<a class="dropdown-item" href="view-projects.php?id='.$id.'"><i class="fa fa-solid fa-folder-open"></i>  View my companies</a> ';
                            }else{
                                echo '<a class="dropdown-item" href="view-investments.php?id='.$id.'"><i class="fa fa-solid fa-briefcase"></i>  View my investments</a> ';
                            }
                        echo '</div>';
                    echo '</li>';
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
