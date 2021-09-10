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

    function defualtView()
    {
        $this->load->view('templates/header');
        $this->load->view('pizzas');
        $this->load->view('templates/footer');
    }

    function getPizzas()
    {
        $this->defualtView();
        return $this->pizzaModel->fetchData();
    }
    function validator()
    {
        $this->form_validation->set_rules('pizzaName', 'PizzaName', 'required|alpha');
        $this->form_validation->set_rules('ingredients', 'Ingredients', 'required|alpha_numeric_spaces');
    }
    function addPizza($name, $ingredients)
    {
        $queryTerm = "INSERT INTO pizzas_table (pizzaName,ingredients) VALUES ('$name','$ingredients')";
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('add');
            $this->load->view('templates/footer');
        } else {
            $this->pizzaModel->executeQuery($queryTerm);
            $this->defualtView();
        }
    }
    function deletePizza($id)
    {
        $queryTerm = "DELETE FROM pizzas_table WHERE id=$id";
        $this->pizzaModel->executeQuery($queryTerm);
        $this->defualtView();
    }
    function editPizza($name, $ingredients, $id)
    {
        $queryTerm = "UPDATE FROM pizzas_table pizzaName=$name,ingredients=$ingredients WHERE id=$id";
        $this->pizzaModel->executeQuery($queryTerm);
        $this->defualtView();
    }
}
