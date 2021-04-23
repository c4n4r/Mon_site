<?php


namespace App\Infrastructure\Form;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class FormManager implements FormManagerInterface
{

    public function __construct(private FormInterface $form){}

    public function createView(){
        return $this->form->createView();
    }

    public function isValid(): bool{
        return $this->form->isValid();
    }

    public function isSubmitted(): bool{
        return $this->form->isSubmitted();
    }

    public function handleRequest(Request $request) {
        return $this->form->handleRequest($request);
    }

    public function getData()
    {
        return $this->form->getData();
    }
}
