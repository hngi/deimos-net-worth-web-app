<?php
session_start();
$data = [];
// connect to database
$db = mysqli_connect('localhost', 'root', '12345678','registration');
$leaderboard = "SELECT DISTINCT username,networth,created_at FROM networth  ORDER BY networth DESC ";
// $leaderboard = "SELECT DISTINCT user_id,username,networth,created_at FROM networth GROUP BY user_id ORDER BY networth DESC ";
    $result = mysqli_query($db, $leaderboard);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $db_data = [
                'username' => $row['username'],
                'networth' => $row['networth'],
                'created_at' => $row['created_at'],
            ];
           

            array_push($data, $db_data);
            $_SESSION['data_default'] = $data;
            
        }
    }
    mysqli_close($db);
    

    if(isset($_SESSION['username'])){    
        $username   = $_SESSION['username'];
     }
     if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
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

                <?php include('nav.php'); ?>
                
                <?php endif; ?>
            </ul>

            </div>
        </nav>
    </header>

    <section>
        <main class="container">
        
            <div class="row" style="margin-top:20px;">
                <div class="main_pad col-xs-12 col-sm-12 col-md-5 col-lg-7 offset-md-3 offset-lg-3">
                    <h1 class="main__caption mt-1 mb-3">Leaderboard </h1>
                    <span class="badge badge-primary">Check Leaders on specific dates</span>
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
            <div class="main_pad col-xs-12 col-sm-12 col-md-5 col-lg-7 offset-md-3 offset-lg-3">
            <h1 class="main__caption mt-1 mb-3">Richest People in Deimos </h1>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            
                            <th>Initial</th>
                            <th>Networth (₦)</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php if(isset($_SESSION['data'])):
                                $data = $_SESSION['data'];
                             ?>
                            
                                    <?php foreach($data as $leader) : ?> 
                                    
                                    <tr>
                                    <?php 
                                            $string = $leader['username'];
                                            $expr = '/(?<=\s|^)[a-z]/i';
                                            preg_match_all($expr, $string, $matches);
                                            $result = implode('', $matches[0]);
                                            $result = strtoupper($result);
                                        ?>
                                        <td>
                                            <span class="badge badge-info" style="border-radius:50%;"><?php echo $result;  ?>
                                            </span>
                                        </td>
                                        <?php $netw = (int)$leader['networth'];?>

                                        <?php if ($netw < 0):  ?>
                                            <td><?php echo number_format($leader['networth']);  ?> (debtor)</td>
                                        <?php else: ?> 
                                            <td><?php echo number_format($leader['networth']);  ?></td>
                                        <?php endif; ?>
                                        <td><?php echo $leader['created_at'];  ?></td>
                                    </tr>
                                    <?php  endforeach; ?>
                                    <?php unset($_SESSION['data']); ?>

                            <?php elseif(isset($_SESSION['data_default']) && !isset($_SESSION['data']) ):
                                $data = $_SESSION['data_default'];
                             ?>
                            
                                    <?php foreach($data as $leader) : ?>
                                    <tr>
                                        <?php 
                                            $string = $leader['username'];
                                            $expr = '/(?<=\s|^)[a-z]/i';
                                            preg_match_all($expr, $string, $matches);
                                            $result = implode('', $matches[0]);
                                            $result = strtoupper($result);
                                        ?>
                                        <td><span class="badge badge-info" style="border-radius:50%;">
                                        <?php echo $result;  ?></span>
                                    </td>
                                    <?php $netw = (int)$leader['networth'];?>
                                        <?php if ($netw < 0):  ?>
                                            <td><?php echo number_format($leader['networth']);  ?> (debtor)</td>
                                        <?php else: ?> 
                                            <td><?php echo number_format($leader['networth']);  ?></td>
                                        <?php endif; ?>
                                        <td><?php echo date('M j', strtotime($leader['created_at']) );  ?></td>
                                    </tr>
                                    <?php  endforeach; ?>

                            <?php elseif(isset($_SESSION['error']) ): ?>
                            <!-- && isset($_SESSION['data_default']) -->
                                <?php include('error.php'); ?>
                                <?php unset($_SESSION['error']); ?>
                                <?php unset($_SESSION['data_default']); ?>
                            <?php  endif; ?> 

                            
                        </tbody>
                    </table>
                </div>
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


