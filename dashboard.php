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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Net Worth</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/36afc40636.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="icon" type="image/x-icon" href="./img/Purple logo Group.png">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container-fluid" id="header__nav">
            <?php include('logo.php'); ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto navbar__menu">
                <?php if(!isset($username)): ?>
                <li class="nav-item active">
                    <button class="m-3 pt-1 pl-3 pr-3 pb-1">Log in</button>
                </li>
                <li class="nav-item">
                    <button class="m-3 pt-1 pl-3 pr-3 pb-1">Sign up</button>
                </li>
                <?php else: ?>
                <li class="nav-item">
                   <span class="dashboard-header-span">Hello, <?php echo $username;?></span>  
                </li>
                <?php endif; ?>
            </ul>

                <form action="server.php" method="GET">
                    <button type="submit" id="btn-css" name="logout">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <section>
        <main class="container">
            
            <?php if(isset($_SESSION['net_worth']) ): $netWorth = $_SESSION['net_worth'];  ?>
            <div class="alert alert-primary">
                <h4>
                    Your Net Worth : <span class="badge" id="badge-bg">₦ <?php echo number_format($netWorth,2); ?> </span> 
                    
                </h4>
<style>.get-started:focus { color:#000 !important; }</style>
    <form action="certificate.php">  <button type="submit" class="btn btn-primary" name="get_networth">View Certificate</button>
        </form>  </div>
            <?php elseif(isset($error)): ?>
           
                <?php include('error.php'); ?>
                <?php unset($_SESSION['error']); ?>
           
            <?php else:?>

            <?php endif; ?>
            
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                    <p class="main__caption">Enter the monetary value of your assets and liabilities to calculate your Net Worth </p>
                </div>
            </div>
            <div class="line-through"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3" style="padding:25px;">
                <h1 class="form-caption" style="font-size:1.7rem !important;">Assets</h1>
                    <form action="server.php" method="POST">
                        
                        <div class="form-group">
                          <label for="Investments">Investments</label>
               <input type="number" class="form-control" id="Investments" name="investments" placeholder="0 NGN">
                        </div>
                        <div class="form-group">
                            <label for="Cash">Cash</label>
                            <input type="number" class="form-control" id="Cash" name="cash" placeholder="0 NGN">
                        </div>
                        <div class="form-group">
                            <label for="Bank Account">Bank Account</label>
                            <input type="number" class="form-control" id="Bank Account" name="bank_account" placeholder="0 NGN">
                        </div>  
                        <div class="form-group">
                            <label for="Real Estate">Real Estate</label>
                            <input type="number" class="form-control" id="Real Estate" name="real_estate" placeholder="0 NGN">
                        </div>

                        
                      <!-- </form> -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3" style="padding:25px;">
                    <!-- <form> -->
                        <h1 class="form-caption" style="font-size:1.7rem !important;">Liabilties</h1>
                        <div class="form-group">
                            <label for="Loans">Loans</label>
                            <input type="number" class="form-control " id="Loans" name="loans" placeholder="0 NGN">
                        </div>
                        <div class="form-group">
                            <label for="Mortgages">Mortgages</label>
                            <input type="number" class="form-control" id="Mortgages" name="mortgages" placeholder="0 NGN">
                        </div>
                        <div class="form-group">
                            <label for="Utility bills">Utility bills</label>
                            <input type="number" class="form-control" id="Utility bills" name="utility_bills" placeholder="0 NGN">
                        </div>
                        <div class="form-group">
                            <label for="Other debts">Other debts</label>
                            <input type="number" class="form-control" id="Other debts" name="other_debts" placeholder="0 NGN">
                        </div>
                        <div>
                            <button type="submit" class="get-started" name="get_networth"> Get Net Worth</button>
                        </div>

                        
                        
                    </form>
                    
                </div>
                
            </div>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
