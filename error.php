<?php if(isset($_SESSION['error']) ): $errors = $_SESSION['error'];  ?>
<div class="alert alert-danger">
<h5>
    <?php echo $errors[0]; ?> </span> 
</h5>
</div>
<?php endif; ?>







