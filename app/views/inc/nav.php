<header>
    <div class="search-bar">
        <div class="input">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search">
        </div>
        <div class="close-container">
            <i class="fa-solid fa-xmark btnClose"></i>
        </div>

    </div>
    <div class="container-md">

        <nav>
            <div class="burger">
                <img src="<?php echo URLROOT?>/public/img/burger.png" alt="burger" />
            </div>
            <div class="logo-container">
                <a href="#">
                    <img src="<?php echo URLROOT?>/public/img/logo.png" alt="SineMkt Logo" class="logo" />
                </a>
            </div>
            <ul class="nav-links">
                <img src="<?php echo URLROOT?>/public/img/close.png" alt="close-burger" class="close" />
                <li><a href="<?php echo URLROOT ?>/pages">Home</a></li>
                <li><a href="<?php echo URLROOT ?>/pages/shop">Shop</a></li>
                <li><a href="<?php echo URLROOT ?>/pages/blog">Blog</a></li>
                <li><a href="<?php echo URLROOT ?>/pages/contact">Contact Us</a></li>
                <?php if(isLoggedIn()) :?>
                <li><a href="<?php echo URLROOT ?>/dashboard">Dashboard</a></li>
                <?php endif ;?>
            </ul>
            <div class="icons-container">
                <i class="fa-solid fa-magnifying-glass search"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <?php if(!isLoggedIn()) :?>
                
                    <a href="<?php echo URLROOT ?>/users/login"><i class="fas fa-sign-in"></i></a>
                <?php else :?>
                    <a href="<?php echo URLROOT ?>/users/logout"><i class="fas fa-sign-out"></i></a>
                <?php endif;?>
            </div>
        </nav>
    </div>
</header>