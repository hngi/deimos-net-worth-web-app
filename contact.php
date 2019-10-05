<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$header = 'From: Deimos Net Worth Contact Form'; 
		$to = 'ezechukwu.nonso@yahoo.com'; 
		$subject = 'Message from Contact Form ';
		
		$body = "From:".$name."\n E-Mail:".$email."\n Message:\n".$message;
        //print_r($body); die;
 
		// Check if name has been entered
		if (empty($_POST['name'])) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (empty($_POST['message'])) {
			$errMessage = 'Please enter your message';
		}
 
        // If there are no errors, send the email
        // $errName && !$errEmail && !$errMessage && !$errHuman
        // mail ($to, $subject, $body, $from)
        if (!isset($errName) && !isset($errEmail) && !isset($errMessage)) {
	        if (mail ($to, $subject, $body, $header)) {
		        $result='<div class="alert alert-success">Thank You! We will be in touch</div>';
	        } 
            else {
		        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
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
        <meta name="description" content="">
        <meta name="og:title" property="og:title" content="">
        <link href="index.php" rel="canonical">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/36afc40636.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/contact.css">
        <link rel="icon" type="image/x-icon" href="./img/Purple logo Group.png">
        <title>Deimos' Networth Calculator | Contact Us</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light container-fluid" id="header__nav">
                <a class="navbar-brand" href="index.php"><img src="./img/networth logo.svg"><span class=" text-light header__nav__brand ml-3 mt-2 font-weight-bold">NetWorth</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto navbar__menu">
                        <form action="index.php">
                            <li class="nav-item active">
                                <button class="m-3 pt-1 pl-3 pr-3 pb-1">Home</button>
                            </li>
                        </form>
                        <form action="login.php">
                            <li class="nav-item">
                                <button type="submit" class="m-3 pt-1 pl-3 pr-3 pb-1">Login</button>
                            </li>
                        </form>
                    </ul>
                </div>
            </nav>
        </header>

        <!--SHOWCASE-->

        <section class="showcase">
            <img src="img/contact-banner.jpg" alt="Contact" class="showcase" style="width:100%">
            <div class="showcase-text">Contact Us</div>
        </section>

        <!--FOOTER-->

        <div class="container-fluid footer p-5">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 mb-3">
                    <h2><strong>Feel Free To Reach Out</strong></h2>

                    <br>

                    <h3 class="text-white ">We Reply In Less Than 24 Hours</h3>
                    <p> Deimos Networth Team customer representatives are available 24/7.</p>

                    <br>

                    <div class="col-md-8">
                        <!--------Form in footer-------->

                        <h5>Contact Us</h5>

                        <br>

                        <form role="form" method="post" action="contact.php">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Your Name">
                                <?php if(isset($errName)){
                                    echo "<p class='text-danger'>" . $errName ."</p>";
                                    }
                                ?>
                            </fieldset>

                            <fieldset class="form-group">
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email" value="
                                <?php if(isset($_POST['email'])){
                                         echo htmlspecialchars($_POST['email']);
                                }
                               ?>">
                               <?php 
                                    if(isset($errEmail)){
                                        echo "<p class='text-danger'>".$errEmail."</p>";
                                    }?>
                            </fieldset>

                            <fieldset class="form-group">
                                <textarea class="form-control" name="message" required placeholder="Enter Message" value="
                                    <?php if(isset($_POST['message'])){
                                        echo htmlspecialchars($_POST['message']);
                                    }?>">
                                </textarea>
                                <?php 
                                if(isset($errMessage)){
                                    echo "<p class='text-danger'>".$errMessage."</p>";
                                }?>
                            </fieldset>

                            <fieldset class="form-group ">
                                <button id="submit" name="submit" type="submit" value="SEND" class="contact-button btn btn-ft btn-lg px-4">SEND</button>
                            </fieldset>
                            <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <?php if(isset($result)){
                                    echo $result;
                                    }
                                ?>
                            </div>
                        </div>
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