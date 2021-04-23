<?php

namespace App\Responder;

use Twig\Environment;

interface TwigResponderInterface
{
    public function __construct(Environment $twig);
    public function present(mixed $viewModel);
}
