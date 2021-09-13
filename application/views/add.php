<section class="container">
    <h4 class="center">Add New Pizza</h4>
    <?= form_open("PizzaController/addPizza"); ?>
    <?= form_error('pizzaName'); ?>
    <input type="text" name="pizzaName" placeholder="Add Pizza Name" value="">
    <?= form_error('ingredients'); ?>
    <input type="text" name="ingredients" placeholder="Ingredients Space Separated" value="">
    <input type="submit" name="submit" value="submit" class="btn">
    </form>
</section>