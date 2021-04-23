<?php


namespace App\Responder\Admin\Http\Forms\Add;


use App\Responder\TwigResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AddResponder implements TwigResponderInterface
{
    public function __construct(private Environment $twig){}

    public function present($viewModel): Response
    {
        return new Response($this->twig->render('admin/pages/add.resource.html.twig', ['form' => $viewModel->form->createView(), 'message' => $viewModel->message]));
    }


}
