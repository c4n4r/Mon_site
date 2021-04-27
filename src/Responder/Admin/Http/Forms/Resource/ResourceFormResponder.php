<?php


namespace App\Responder\Admin\Http\Forms\Resource;

use App\Responder\TwigResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ResourceFormResponder implements TwigResponderInterface
{
    public function __construct(private Environment $twig){}

    /**
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\LoaderError
     */
    public function present($viewModel): Response
    {
        return new Response($this->twig->render('admin/pages/resource.form.html.twig', ['form' => $viewModel->form->createView(), 'label' => $viewModel->label]));
    }


}
