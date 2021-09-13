<h4 class="center">Pizzas</h4>
<div class="container">
    <div class="row">
        <?php foreach ($modelReturn as $pizza) { ?>

            <div class="col s6 m3">
                <div class="card">
                    <div class="card-content center">
                        <h5><?=/* how to access object types */ htmlspecialchars($pizza->pizzaName) ?></h5>
                        <h6><?= htmlspecialchars($pizza->ingredients) ?></h6>
                    </div>
                    <div class="card-action">
                        <div class="left-align">
                            <?= form_open("pizzaController/editPizza/$pizza->id"); ?>
                            <input type="hidden" name="id" value=<?= $pizza->id ?>>
                            <input type="submit" name="submit" value="Edit" class="btn">
                            </form>
                        </div>
                        <div class="right-align">
                            <?= form_open("pizzaController/deletePizza"); ?>
                            <input type="hidden" name="id" value=<?= $pizza->id ?>>
                            <input type="submit" name="submit" value="Delete" class="btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

</div>