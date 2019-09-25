<?php if(isset($_SESSION['error']) ): $errors = $_SESSION['error'];  ?>
<div class="alert alert-danger">
<h3>
    <?php echo $errors[0]; ?> </span> 
</h3>
</div>
<?php endif; ?>

