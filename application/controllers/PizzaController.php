<?php

class PizzaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pizzaModel");
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        echo "hgsfdshdfkjdsgkfjs";
    }

    function viewLoader($viewName)
    {
        $this->load->view("templates/header");
        $this->load->view("$viewName");
        $this->load->view("templates/footer");
    }
    function defualtView($gtn = null)
    {

        if (!is_null($gtn)) {
            $this->load->view("templates/header");
            $this->load->view('pizzas', $gtn);
            $this->load->view("templates/footer");
        } else
            $this->load->view('templates/header');
    }

    function getPizzas()
    {
        $data['modelReturn'] = $this->pizzaModel->fetchData();
        $this->defualtView($data);
    }
    function validator()
    {
        $this->form_validation->set_rules('pizzaName', 'PizzaName', 'required|alpha');
        $this->form_validation->set_rules('ingredients', 'Ingredients', 'required|alpha_numeric_spaces');
    }
    function addPizza()
    {

        $newName = $this->input->post('pizzaName');
        $newIngredients = $this->input->post('ingredients');
        $queryTerm = "INSERT INTO pizzas_table (pizzaName,ingredients) VALUES ('$newName','$newIngredients')";
        $this->validator();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('add');
            $this->load->view('templates/footer');
        } else {
            $this->pizzaModel->executeQuery($queryTerm);
            $this->getPizzas();
        }
    }
    function deletePizza()
    {
        $id=$this->input->post('id');
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
        $this->validator();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('edit',$data);
            $this->load->view('templates/footer');

        } else {
            $this->pizzaModel->executeQuery($queryTerm);
            $this->getPizzas();
        }
    }
}
