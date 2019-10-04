<?php
session_start();

if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
}

if(isset($_SESSION['username'])){    
$username   = $_SESSION['username'];
}

if(isset($_SESSION['success'])){
    $success    = $_SESSION['success'];
}

$message = "";
$err = "";

if (isset($_POST["send"])) {
    
    if(empty($_POST["email"]) || empty($_POST["message"])){

        $err = "<h3 class='text-white'>Please Enter Email and Message</h3>";

    }else{
        if(file_exists('advice.json')){
        $current_data = file_get_contents('advice.json');
        $array_data = json_decode($current_data, true);
        $extra = array(
            'email' => $_POST['email'],
            'message' => $_POST['message']
        );
        $array_data = $extra;
        $final_data = json_encode($array_data);
            if (file_put_contents('advice.json', $final_data)) {
                $message = "<h3 class='text-white'>Your Message Has been Sent</h3>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investment Advice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/36afc40636.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/investment.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="icon" type="image/x-icon" href="img/Purple logo Group.png">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container-fluid" id="header__nav">
            <!--------Navigation-------------------->
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.jpg">
                <span class=" header__nav__brand ml-3 mt-2 font-weight-bold">NetWorth</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto navbar__menu">
                    <?php if(!isset($username)): ?>
                
                    <?php else: ?>
                    <li class="nav-item">
                    <span class="dashboard-header-span" style="font-weight:bold;">Hello, <?php echo ucfirst($username);?> &nbsp;</span>  
                    </li>
                    <li class="nav-item">
                    <form action="server.php">
                            <button type="submit" name="logout"> &gt; &gt; &nbsp;Logout</button>
                    </form>
                    </li>
                    
                    <?php endif; ?>
                    <!-- <form action="dashboard.php">
                        <li class="nav-item active">
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1">Dashboard</button>
                        </li>
                    </form>

                    <form action="server.php" method="GET">
                        <li>
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1" id="btn-css"
                                name="logout">Logout</button>
                        </li>
                    </form>

                    <form action="login.php">
                        <li class="nav-item active">
                            <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1">Log in</button>
                        </li>
                    </form>
                    <form action="login.php">
                        <li class="nav-item">
                            <button class="m-3 pt-1 pl-3 pr-3 pb-1">Sign up</button>
                        </li>
                    </form> -->

                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-3">
        <!--------Body-------------------->
        <div class="row align-items-center">
            <!--------Landing Area Content-------->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 mb-5 content">
                <h1>Hello <br> <?php echo ucfirst($username);?>,</h1>

                <br>

                <h2>We can grow your <br> your assets from <span class="tab"> NGN <?php echo number_format($_SESSION['net_worth'],2); ?> </span> </h2>

                <br>

                <h2> Let's show you how. </h2>

                <p> Re-evaluate your invstement strategies with Networth.</p>


            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 d-none d-md-block">
                <!--------landing area image-------------------->
                <img src="img/investmentl.gif" alt="investment-coin" id="invCoin">

            </div>
        </div>

        <div class="shadow-lg p-5 mb-5 bg-white rounded cta">
            <!--------Center Info ------->

            <h2> OPPORTUNITIES </h2>

            <br>

            <p> At Deimos Networth, we strive to help you make financial decisions with confidence. To do this, many or
                all of the products featured here are from our partners. However, this doesn’t influence our
                evaluations. Our opinions are our own.</p>

        </div>

        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <!--------suggesttions-------------------->
            <h3> Partner with Hotels.ng </h2>
                <p> You can now earn more than N100,000 monthly referring new corporate clients to hotels.ng. </p>

                <button class="btn btn-default btn-sm px-4 py-2"> Read More</button>
        </div>

        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <!--------suggesttions-------------------->
            <h3> Partner with an on-demand Taxi Service</h3>

            <p> Lagos residents often don’t use their cars for days or weeks at a time. That idle time can translate to
                money with services like Uber & Taxify, which let you get people around. Earning potential varies by car
                and location, but standard vehicles typically rent for N3000 to N5000 per hour.</p>

            <button class="btn btn-default btn-sm px-4 py-2"> Read More</button>
        </div>

        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <!--------suggesttions-------------------->
            <h3>Mutual Funds</h3>

            <p> Mutual funds enable you to invest in many companies at once, from the largest and most stable, to the
                new and fast-growing. They have teams of managers who choose companies for the fund to invest in, based
                on the fund type. Mutual funds spreads your investment among many companies and helps you avoid the
                risks that come with investing in single stocks.</p>

            <button class="btn btn-default btn-sm px-4 py-2"> Read More</button>
        </div>


        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <!--------suggesttions-------------------->
            <h3> List your spare bedroom on Airbnb</h3>

            <p> Have a spare bedroom — or two? Making it available on vacation rental sites can provide a lucrative side
                income. For example, Airbnb hosts earn an average of $924 per month, according to data from Earnest, an
                online lender. If you’re a renter, just make sure that everything is kosher with your rental agreement
                beforehand.</p>

            <button class="btn btn-default btn-sm px-4 py-2"> Read More</button>
        </div>

        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <!--------suggesttions-------------------->
            <h3> Pick up freelance work online</h3>

            <p> Websites such as Upwork, Fiverr and Freelancer offer opportunities to do a variety of freelance jobs,
                such as writing, programming, design, marketing, data entry and being a virtual assistant. Fluent in a
                second language? Check sites such as Gengo or One Hour Translation, or drum up business through a site
                of your own. No matter what kind of freelancing you do, keep track of the going rate for the kind of
                work you provide so you know if you’re charging too much or too little.</p>

            <button class="btn btn-default btn-sm px-4 py-2"> Read More</button>
        </div>

        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <!--------suggesttions-------------------->
            <h3> Make deliveries for O-ride, Jumia Food</h3>

            <p> Websites such as Upwork, Fiverr and Freelancer offer opportunities to do a variety of freelance jobs,
                such as writing, programming, design, marketing, data entry and being a virtual assistant. Fluent in a
                second language? Check sites such as Gengo or One Hour Translation, or drum up business through a site
                of your own. No matter what kind of freelancing you do, keep track of the going rate for the kind of
                work you provide so you know if you’re charging too much or too little.</p>

            <button class="btn btn-default btn-sm px-4 py-2"> Read More</button>
        </div>
    </div>

    <div class="container-fluid footer p-5">
        <!--------footer area-------->
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 mb-3">
                <h2><strong>Looking for more Specialized Investments? </strong></h2>

                <br>

                <h3 class="text-white ">Get Insights from our Investment Advisors.</h3>
                <p> Deimos Networth Team has been proud to help our clients pursue their financial goals while giving
                    them more time to focus on what really matters in life. Everything we offer — from guidance, to
                    powerful trading tools, to retirement resources — is built around one thing....you.</p>

                <br>

                <div class="col-md-8">
                    <!--------Form in footer-------->

                    <h5>Contact Us</h5>

                    <br>

                    <form method="post">
                        <?php echo $err; ?>
                        <fieldset class="form-group">
                            <input type="email" name="email" class="form-control" id="contactEmail" placeholder="Enter email">
                        </fieldset>

                        <fieldset class="form-group">
                            <textarea class="form-control" name="message" id="contactMessage" placeholder="Message"></textarea>
                        </fieldset>

                        <fieldset class="form-group ">

                            <button type="submit" name="send" class="btn btn-ft btn-lg px-4 text-white">SEND</button>

                        </fieldset>
                        <?php echo $message; ?>
                    </form>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 d-none d-lg-block d-xl-block">
                <!--------Image in footer-------->
                <img src="img/invest.png" alt="investor" id="investor">

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>