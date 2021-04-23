<?php


namespace App\Infrastructure\Form;
use Symfony\Component\Form\FormFactoryInterface;
use function ucfirst;

class FormsFactory implements FormsFactoryInterface
{

    public function __construct(private FormFactoryInterface $factory){}

    public function createForm(string $type, $data = null): FormManagerInterface
    {
        $className = 'App\Infrastructure\Form\Type\\'.ucfirst($type).'Type';
        $form = $this->factory->create($className,$data);
        return new FormManager($form);
    }

}
