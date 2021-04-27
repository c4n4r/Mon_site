<?php


namespace App\Responder\Admin\Http\Dashboard;


use App\Responder\TwigResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class DashboardResponder implements TwigResponderInterface
{

    public function __construct(private Environment $twig){}

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function present(mixed $viewModel): Response
    {
        return new Response($this->twig->render('admin/pages/dashboard.html.twig'));
    }
}
