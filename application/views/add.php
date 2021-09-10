<?php
    $addPizza = new PizzaController();
    if(isset($_POST['submit'])){
        $addPizza->addPizza($_POST['pizzaName'],trim($_POST['ingredients']));
    }
?>

<section class="container">
    <h4 class="center">Add New Pizza</h4>
    <form class="white" action = "add.php" method="POST">
    <?= form_error('pizzaName'); ?>    
    <input type="text" name = "pizzaName" placeholder="Add Pizza Name">
    <?= form_error('ingredients'); ?>    
    <input type="text" name = "ingredients" placeholder="Add Pizza Ingredients">
        <input type = "submit" name = "submit" value = "submit" class="btn">
    </form>
</section> 