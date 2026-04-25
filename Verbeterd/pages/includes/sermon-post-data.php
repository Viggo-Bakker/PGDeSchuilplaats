<?php 

if(isset($_POST['submit'])) {

    //set form data
    $formData = new \System\Form\Data($_POST);

    //overide sermon object with new data
    $sermon->date = $formData->getPostVar('date');
    $sermon->name = $formData->getPostVar('name');
    $sermon->title = $formData->getPostVar('title');

    //actual validation

    // $errors = ...;
}