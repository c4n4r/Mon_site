<?php

namespace App\Infrastructure\Form;

use Symfony\Component\HttpFoundation\Request;

interface FormManagerInterface
{
    public function createView();

    public function isValid(): bool;

    public function isSubmitted(): bool;

    public function handleRequest(Request $request);

    public function getData();
}
