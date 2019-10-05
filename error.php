
<?php if(isset($_SESSION['error']) ): $errors = $_SESSION['error'];  ?>
<div class="alert alert-danger">
<span style="font-size:13px; font-weight:bold;">  
    
    <span><?php echo $errors[0]; ?> </span> 
    <?php unset($_SESSION['error']); ?>
</span>
</div>

<?php elseif( isset($_SESSION['error']) ): ?>
    <?php var_dump('go'); die(); ?>
<?php endif; ?>









