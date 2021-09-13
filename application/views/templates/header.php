<!DOCTYPE html>
<html>
    <head>
        <title>CI Project</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body class = "white">
    <nav class = "grey lighten-10">
    <div class="container">
        <?= anchor('PizzaController/getPizzas','Home','class="brand-logo"'); ?>
        <ul class="right">
        <?= anchor('PizzaController/viewLoader/add','Add Pizza','class="btn"'); ?>
        </ul>
    </div>
    </nav>