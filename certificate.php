<?php
session_start();

$networth ="";
$worthlevel="";

$newNetWorth = $_GET['net_session']; //get the incoming netvalue

/**Process data */
$exVal = explode(',',$newNetWorth);
$parts=array_filter($exVal);
$networthValue = implode("",$parts);



$netVal = (int)$networthValue; //convert to int
$_SESSION['net_worth'] = $netVal; //assign to session

require('location.php');

// var_dump($netVal); die();
 if(isset($_SESSION['net_worth'])) {
    switch ($_SESSION['net_worth']) {
        case $_SESSION['net_worth'] < 100000:
            
            $_SESSION['worthlevel'] = $country_name;
            break; 
            
        case ($_SESSION['net_worth'] > 100000 && $_SESSION['net_worth'] < 200000):
            $_SESSION['worthlevel'] = "Shatta Bandle!"; 
            break;
    
        case ($_SESSION['net_worth'] > 200000 && $_SESSION['net_worth'] < 1000000):
            $_SESSION['worthlevel'] = "Dangote!"; 
            break;

        case ($_SESSION['net_worth'] > 1000000 && $_SESSION['net_worth'] < 5000000):
            $_SESSION['worthlevel'] = "Zuckerberg Apprentice!"; 
            break;
    
        case( $_SESSION['net_worth'] > 5000000 && $_SESSION['net_worth'] < 10000000):
            $_SESSION['worthlevel'] = "Bill Gate Wonna Be!"; 
            break;

        case $_SESSION['net_worth'] > 10000000:
            $_SESSION['worthlevel'] = "Jeff Bezos!"; 
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/chomsky" type="text/css" />

        <link rel="icon" type="image/x-icon" href="./img/Purple logo Group.png">
        <title>Networth Calculator | Certificate</title>
    </head>

    <body>
        <div id="content">
            <!------Logo Background-->
            <div class="opct">
                <!--------------Gradient Overlay-->
                <div class="container" id="main">

                    <div class="justify-content-end align-self-center ml-4" style="float: right;">

                        <img src="img/medal.svg" alt="awardseal" class="logo img-fluid">
                    </div>

                    <h1 id="cert-title">Certificate of Networth</h1> <br>

                    <h4>This is to certify that you have been rated</h4> <br>

                    <p class="text">
                        Typical Average <?php echo $_SESSION['worthlevel']?>
                    </p> <br>
                    <?php unset($_SESSION['worthlevel']); ?>

                    <h4>with a networth of</h4> <br>

                    <p class="text"><?php $currency = array_search($country_name, $curr);if ($currency) {echo $currency;}else{echo $country_code; }?>
                        <?php echo number_format($_SESSION['net_worth'],2); ?>
                    </p> <br>


                    <p id="footer"><em>Signed</em></p>
                    <div class="">
                        <img src="img/signature.svg" alt="signature" style="width: 5em; margin-top:-15px; margin-bottom: -5px;">
                    </div>
                    <p>Deimos Elders</p>
                    
                
                    <form action="dashboard.php">
                        <button type="submit" style="margin-bottom:40px;" class="btn btn-primary">Back to Dashboard</button>
                    </form>
                        
                        
                    <form action="investment.php">
                        <button type="submit" style="margin-bottom:40px;" class="btn btn-default btn-grad text-white font-weight-bold">Get FREE Investment Advice</button>
                    </form>    
                    
                    <div class="share-buttons ">
                    <a href="# " class="fab fa-facebook" style="color:#6D1AD8;"></a>
                    <a href="# " class="fab fa-twitter" style="color:#6D1AD8;"></a>
                    <a href="# " class="fab fa-linkedin" style="color:#6D1AD8;"></a>
                    <a href="# " class="fab fa-pinterest" style="color:#6D1AD8;"></a>
                
                </div>
            </div>
        </div>
    </div>
    <script>
        let facebook_link = document.querySelector('.fa-facebook')
        facebook_link.href = `https://www.facebook.com/sharer/sharer.php?u=${window.location.href}`

        let twitter_link = document.querySelector('.fa-twitter')
        let cert_title = document.querySelector('#cert-title').innerHTML
        twitter_link.href = `https://twitter.com/intent/tweet?url=${window.location.href}&amp;text=${cert_title}`

        let linkedin_link = document.querySelector('.fa-linkedin')
        linkedin_link.href = `https://www.linkedin.com/shareArticle?mini=true&amp;url=${window.location.href}&amp;title=${cert_title};summary=&amp;source=`
        
        let pinterest_link = document.querySelector('.fa-pinterest')
        pinterest_link.href = `https://pinterest.com/pin/create/button/?url=${window.location.href}&amp;media=&amp;description=`
    </script>
</body>
</html>