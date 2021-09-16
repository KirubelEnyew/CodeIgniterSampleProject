<?php

$config['validationRules'] = array(
    array(
        'field' => "pizzaName",
        'label' => "PizzaName",
        'rules' => "required|alpha"
    ),
    array(
        'field' => "ingredients",
        'label' => "Ingredients",
        'rules' => "required|alpha_numeric_spaces"
    ),
);
