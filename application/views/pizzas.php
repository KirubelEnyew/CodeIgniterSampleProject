<?php
    $pizzas = new PizzaController();
    $allPizzas = $pizzas->getPizzas();
    if(isset($_POST['submit'])){
        $id=htmlspecialchars($_POST['id']);
        $pizzaView->deletePizza($id);
    }
?>

<h4 class = "center">Pizzas</h4>

<div class="container">
    <div class="row">
        <?php foreach($allPizzas as $pizza){ ?>
        
        <div class = "col s6 m3">
            <div class = "card">
                <div class = "card-content center">
                    <h5><?= htmlspecialchars($pizza['pizzaName']) ?></h5>
                    <h6><?= htmlspecialchars($pizza['ingredients'])?></h6>
                </div>
                <div class = "card-action">
                    <div class = "left-align">
                    <a href="edit.php?id=<?php echo $pizza['id']; ?>">Edit</a>
                    </div>
                    <div class = "right-align">
                        <form action= "pizzas.php" method="POST">
                            <input type="hidden" name="id" value=<?= $pizza['id']?>>
                            <input type="submit" name="submit" value="delete" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>

</div>

