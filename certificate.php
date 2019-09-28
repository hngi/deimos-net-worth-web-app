<?php
session_start();

$networth ="";
$worthlevel="";
 if(isset($_SESSION['net_worth'])) {
    switch ($_SESSION['net_worth']) {
        case $_SESSION['net_worth'] < 100000:
            
            $_SESSION['worthlevel'] = "Typical Average Nigerian";
            break; 
            
        case ($_SESSION['net_worth'] > 100000 && $_SESSION['net_worth'] < 200000):
            $_SESSION['worthlevel'] = "Money Shark!"; 
            break;
    
        case ($_SESSION['net_worth'] > 200000 && $_SESSION['net_worth'] < 1000000):
            $_SESSION['worthlevel'] = "Dangote!"; 
            break;
    
        case $_SESSION['net_worth'] > 1000000:
            $_SESSION['worthlevel'] = "Bill Gate Wonna Be!"; 
            break;
        
        default:
             $_SESSION['worthlevel'] = "";
            break;
    }
 }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="og:title" property="og:title" content="">

    <link href="index.php" rel="canonical">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/certificate.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/chomsky" type="text/css" />

    <link rel="icon" type="image/x-icon" href="./img/Purple logo Group.png">
    <title>Networth Calculator | Certificate</title>
</head>

<body>
    <div id="content"> <!------Logo Background-->
        <div class="opct" > <!--------------Gradient Overlay-->
            <div class="container" id="main">

                <div class="justify-content-end align-self-center ml-4" style="float: right;">

                    <img src="img/medal.svg" alt="awardseal" class="logo img-fluid">
                </div>

                <h1>Certificate of Networth</h1> <br>

                <h4>This is to certify that you have been rated</h4> <br>

                <p class="text"><?php echo $_SESSION['worthlevel']?></p> <br>
                <?php unset($_SESSION['worthlevel']); ?>

                <h4>with a networth of</h4> <br>

                <p class="text">NGN <?php echo number_format($_SESSION['net_worth'],2); ?></p> <br>
                <?php  unset($_SESSION['net_worth']); ?>

                <p id="footer"><em>Signed</em></p>
                <div class="">
                <img src="img/signature.svg" alt="signature" style="width: 5em; margin-top:-15px; margin-bottom: -15px;" >
                </div> <br>
                <p>Deimos Elders</p>


                <form action="dashboard.php">
                    <button type="submit" style="margin-bottom:40px;" class="btn btn-primary">Back to Dashboard</button>
                </form>
                

            </div>
        </div>
    </div>
</body>
</html>

