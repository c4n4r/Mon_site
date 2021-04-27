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
        $vm = new DashboardViewModel();
        return $this->dashboardResponder->present($vm);
    }

}
