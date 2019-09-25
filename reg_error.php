<?php if(isset($_SESSION['reg_error']) ): $errors = $_SESSION['reg_error'];  ?>
<div class="alert alert-danger">
<h3>
    <?php echo $errors[0]; ?> </span> 
</h3>
</div>
<?php endif; ?>