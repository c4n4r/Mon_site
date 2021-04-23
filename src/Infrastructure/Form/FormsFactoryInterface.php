<?php

namespace App\Infrastructure\Form;

interface FormsFactoryInterface
{
    public function createForm(string $type, $data = null): FormManagerInterface;
}
