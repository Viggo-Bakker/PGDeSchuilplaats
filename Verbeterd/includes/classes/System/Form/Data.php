<?php namespace System\Form;

class Data
{
    public function __construct(private readonly array $post = []) 
    {
    }

    //retrieve a var from the post array
    public function getPostVar(string $var): string
    {
        return htmlentities($this->post[$var]);
    }
}