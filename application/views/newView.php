<?php 

    

?>


<?php echo form_open('Pages/view');?>
<h5>Username</h5>
<?= form_error('username');?>
<input type="text" name="username" value=""/>

<h5>Password</h5>
<?= form_error('password'); ?>
<input type="text" name="password" value=""/>

<h5>re-enter password</h5>
<?= form_error('rePassword'); ?>
<input type="text" name="rePassword" value=""/>

<div><input type="submit"  value="submit" /></div>
</form>
