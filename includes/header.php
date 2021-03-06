<?php
    include 'siteurl.php';
    require 'database_connection.php';
?>

<header class="header_wrapper">
    
    <nav class="navbar navbar-expand-md">
        
        <div class="navbar-icons">
            <a class="navbar-brand" href="<?php if(isset($_SESSION["username"])){
                echo '../index.php';
                } else {
                echo '../views/login.php';
            } ?> "><i class="fas fa-user header_icons"></i></a>
            
            <?php
                if(isset($_SESSION["username"]) && $_SESSION["admin"] == 1){
                    echo "<a class='navbar-brand' href='../views/admin_allposts.php'><i class='fas fa-pen header_icons'></i></a>";
                    }
            ?>
        </div>

        <a class="navbar-brand navbar_logo" href="../index.php">
            <img class="navbar_image" src="<?= $SITE_URL ?>/images/logo_dark.png" alt="Millhouse logo"/>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars header_icons"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item nav_item_top">
                    <a class="nav-link text-uppercase" href="../views/about.php">About</a>
                </li>

                <li class="nav-item">

                    <?php
                    // If not admin echo all post link to user_allposts
                    if(isset($_SESSION["username"]) && $_SESSION["admin"] == 0){
                        echo "<a class='nav-link text-uppercase' href='../views/user_allposts.php'>All posts</a>";
                    //If admin echo all post link to admin_allposts
                    }if(isset($_SESSION["username"]) && $_SESSION["admin"] == 1){
                        echo "<a class='nav-link text-uppercase' href='../views/admin_allposts.php'>All posts</a>";
                    }
                    ?>

                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="../views/contact.php">Contact</a>
                </li>

            </ul>

        </div>

    </nav>
    
    <div class="logged_in">

            <?php
                if (isset($_SESSION["username"])){ ?>
                    <p>You are logged in as <b><?= $_SESSION["username"]; ?></b><br>
                    <a href="../includes/logout.php">Log out</a></p>
            <?php } ?>

    </div>

</header>