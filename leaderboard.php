<?php
session_start();

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
                    <span class="m-3 pt-1 pl-3 pr-3 pb-1" style="font-weight:bold; ">
                        <a href="leaderboard.php" style="text-decoration:none!important; color:#fff !important;">Leaderboard &nbsp; |&nbsp;</a>
                    </span>
                </li>
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
            <div class="row" style="margin-top:20px;">
                <div class="main_pad col-xs-12 col-sm-12 col-md-6 col-lg-7">
                    <h1 class="main__caption mt-1 mb-3">Leaderboard </h1>
                    <!-- <p class="main__description"></p> -->
                    <div class="line-through" style="width:100%;"></div>
                    <div class="description__advantages">
                        <form action="processleaderboard.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="startdate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="enddate" class="form-control">
                                    </div>
                                </div>
                            </div>
                           <button type="submit" class="btn btn-primary" name="leaderboard">Fetch</button>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top:50px;">
            <h1 class="main__caption mt-1 mb-3">Richest People in Deimos </h1>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Networth</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['data'])):
                                $data = $_SESSION['data'];
                             ?>
                            <?php foreach($data as $leader) : ?>
                            <tr>
                                <td><?php echo $leader['username'];  ?></td>
                                <td><?php echo number_format($leader['networth']);  ?></td>
                                <td><?php echo $leader['created_at'];  ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>

    </body>
</html>


