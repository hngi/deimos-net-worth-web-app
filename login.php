<?php 
session_start();


$data = $_SESSION['data'];
?>

<head>
    <title></title>
</head>

<body>
    

    <h1>Logout</h1>
    <form action="php_server/Logout.php" method="POST">
        
        <button type="submit">Logout</button>
    </form>
    
</body>

</html>