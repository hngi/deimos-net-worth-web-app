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
    <link rel="stylesheet" href="css/navbar.css">
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
            </ul>

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
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3 offset-md-3" style="padding:25px;">
                <h1 class="form-caption" style="font-size:1.7rem !important;">Assets</h1>
                <div style="position:relative; margin-bottom:20px;">
                    <span class="add-form-element badge" style="background-color:#6D1AD8; 
                                                                color:#fff; 
                                                                padding:5px;" data-toggle="modal" 
                    data-target="#modal">Add new field <i class="fas fa-plus" style="color: #6D1AD8"></i></span>
                </div>
                
                    <form action="server.php" method="POST">
                        <div id="asset-form">
                            <div class="form-group">
                            <label for="Investments">Investments</label>
                                <input type="number" class="form-control" id="Investments" name="asset[]" placeholder="0 NGN">
                            </div>
                            <div class="form-group">
                                <label for="Cash">Cash</label>
                                <input type="number" class="form-control" id="Cash" name="asset[]" placeholder="0 NGN">
                            </div>
                            <div class="form-group">
                                <label for="Bank Account">Bank Account</label>
                                <input type="number" class="form-control" id="Bank Account" name="asset[]" placeholder="0 NGN">
                            </div>  
                            <div class="form-group">
                                <label for="Real Estate">Real Estate</label>
                                <input type="number" class="form-control" id="Real Estate" name="asset[]" placeholder="0 NGN">
                            </div>

                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Asset</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input class="form-control" id="new-asset" placeholder="Enter Asset Title">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary"   id="add-asset">Add Asset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                        </div>

                        <h1 class="form-caption" style="font-size:1.7rem !important;">Liabilties</h1>
                        <div style="position:relative; margin-bottom:20px;">
                            <span class="add-form-element badge" style="background-color:#6D1AD8; 
                                                                color:#fff; 
                                                                padding:5px;"
                                                                 data-toggle="modal" data-target="#modal-liability">Add new field 
                                <i class="fas fa-plus" style="color: #6D1AD8"></i></span>
                        </div>
                        <div id="liabilities-form">
                            <div class="form-group">
                                <label for="Loans">Loans</label>
                                <input type="number" class="form-control " id="Loans" name="liability[]" placeholder="0 NGN">
                            </div>
                            <div class="form-group">
                                <label for="Mortgages">Mortgages</label>
                                <input type="number" class="form-control" id="Mortgages" name="liability[]" placeholder="0 NGN">
                            </div>
                            <div class="form-group">
                                <label for="Utility bills">Utility bills</label>
                                <input type="number" class="form-control" id="Utility bills" name="liability[]" placeholder="0 NGN">
                            </div>
                            <div class="form-group">
                                <label for="Other debts">Other debts</label>
                                <input type="number" class="form-control" id="Other debts" name="liability[]" placeholder="0 NGN">
                            </div>

                            <div class="modal fade" id="modal-liability" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Liability</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input class="form-control" id="new-liability" placeholder="Enter Liability Title">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary"  id="add-liability">Add Liability</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        

                        </div>
                        <div>
                            <button type="submit" class="get-started" name="get_networth"> Get Net Worth</button>
                        </div>
                        
                      </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-3" style="padding:25px;">
                    <!-- <form> -->
                        
                        

                        
                        
                    <!-- </form> -->
                    

                </div>
                
            </div>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
