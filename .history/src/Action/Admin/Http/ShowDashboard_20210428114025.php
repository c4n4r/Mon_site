<?php


namespace App\Action\Admin\Http;

use App\Responder\Admin\Http\Dashboard\DashboardResponder;
use App\Responder\Admin\Http\Dashboard\DashboardViewModel;
use Symfony\Component\HttpFoundation\Response;

class ShowDashboard
{

    public function __construct(private DashboardResponder $dashboardResponder)
    {
    }

    public function __invoke(): Response
    {
        $viewModel = new DashboardViewModel();
        return $this->dashboardResponder->present($viewModel);
    }

}
