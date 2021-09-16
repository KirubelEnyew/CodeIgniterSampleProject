<?php
require APPPATH . '/core/My_view_loader.php';
class PizzaController extends My_View_Loader
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('validationlibrary');
        $this->load->model('pizzaModel');
    }
    function getPizzas()
    {
        $data['modelReturn'] = $this->pizzaModel->fetchData();
        $this->loaderFunction('pizzas',$data);
    }
    function addPizza()
    {

        $newName = $this->input->post('pizzaName');
        $newIngredients = $this->input->post('ingredients');
        $queryTerm = "INSERT INTO pizzas_table (pizzaName,ingredients) VALUES ('$newName','$newIngredients')";
        $this->validationlibrary->validator();
        if ($this->form_validation->run() == FALSE) {
            $this->loaderFunction('add');
        } else {
            $this->pizzaModel->executeQuery($queryTerm);
            $this->getPizzas();
        }
    }
    function deletePizza()
    {
        $id = $this->input->post('id');
        $queryTerm = "DELETE FROM pizzas_table WHERE id=$id";
        $this->pizzaModel->executeQuery($queryTerm);
        $this->getPizzas();
    }
    function editPizza($id)
    {
        $idToEdit = $id;
        $data['idToEdit'] = $id;
        $name = $this->input->post('pizzaName');
        $ingredients = $this->input->post('ingredients');
        $queryTerm = "UPDATE pizzas_table SET pizzaName='$name',ingredients='$ingredients' WHERE id=$idToEdit";
        $this->validationlibrary->validator();
        if ($this->form_validation->run() == FALSE) {
            $this->loaderFunction('edit',$data);
        } else {
            $this->pizzaModel->executeQuery($queryTerm);
            $this->getPizzas();
        }
    }
}
