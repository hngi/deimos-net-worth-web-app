<?php 
session_start();
// var_dump($_SESSION['username']); die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="og:title" property="og:title" content="">
    <link href="index.php" rel="canonical">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/36afc40636.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="icon" type="image/x-icon" href="./img/Purple logo Group.png">
    <title>Deimos' Networth Calculator | Calculate your networth</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container-fluid" id="header__nav">
            <a class="navbar-brand" href="index.php">
                <img src="./img/networth logo.svg">
                <span class=" text-light header__nav__brand ml-3 mt-2 font-weight-bold">NetWorth</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto navbar__menu">
                    
                <?php if(isset($_SESSION['username'])): ?>
                    <form action="dashboard.php">
                        <li class="nav-item active">
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1">Dashboard</button>
                        </li>
                    </form>
                    
                    <form action="contact.php" method="GET">
                        <li>
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" id="btn-css" name="contact">Contact Us</button>
                        </li>
                    </form>

                    
                    <form action="faq.php" method="GET">
                        <li>
                            <button type="submit"class="m-3 pt-1 pl-3 pr-3 pb-1" name="faq">&nbsp;FAQs&nbsp;</button>
                        </li>        
                    </form>

                    <form action="server.php" method="GET">
                        <li>
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" id="btn-css" name="logout">Logout</button>
                        </li>
                    </form>
                <?php else: ?>
                    <form action="login.php">
                        <li class="nav-item active">
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1">Log in</button>
                        </li>
                    </form>
                    <form action="login.php">
                        <li class="nav-item">
                            <button class="m-3 pt-1 pl-3 pr-3 pb-1">Sign up</button>
                        </li>
                    </form>

                    <form action="contact.php" method="GET">
                        <li>
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" id="btn-css" name="contact">Contact Us</button>
                        </li>
                    </form>
                <?php endif; ?>
                    


                    
                </ul>
            </div>
        </nav>
    </header>
    
    <section>
        <main class="container">
            <div class="row" style="margin-top:-20px;">
                <div class="main_pad col-xs-12 col-sm-12 col-md-6 col-lg-7">
                    <h1 class="main__caption mt-1 mb-3">Your 'Net Worth' is your financial strength. </h1>
                    <p class="main__description">Use Networth to calculate the true financial worth for you and your friends. Get a FREE certificate</p>
                    <div class="line-through"></div>
                    <div class="description__advantages">
                        <p>What does this mean?</p>
                        <p><i class="fas fa-check pr-3"></i>Begin planning for financial freedom</p>
                        <p><i class="fas fa-check pr-3"></i>Begin plotting your future projections</p>
                        <p><i class="fas fa-check pr-3"></i>or just use it for fun</p>
                    </div>

                    <?php if(!isset($_SESSION['username'])): ?>
                        <form action="login.php">
                            <button class="get-started pl-4 pr-4 mt-3 pt-2 pb-2" style="margin-bottom:40px;">Get Started</button>
                        </form>
                    <?php else: ?>
                        <form action="dashboard.php">
                            <button class="get-started pl-4 pr-4 mt-3 pt-2 pb-2" style="margin-bottom:40px;">Dashboard &gt; &gt;</button>
                        </form>

                        
                    <?php endif; ?>
                    
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 text-center">
                    <img class="land-logo" src='./img/deimo-networth.png' width="500px">
                </div>
            </div>
            </main>
    </section>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>