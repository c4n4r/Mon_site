<?php


namespace App\Action\Admin\Http\Forms;


use App\Domain\Admin\ResourceManager;
use App\Infrastructure\Form\FormsFactoryInterface;
use App\Responder\Admin\Http\Forms\Add\AddResponder;
use App\Responder\Admin\Http\Forms\Add\AddViewModel;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Add
{

    public function __construct(private FormsFactoryInterface $formsManager,private AddResponder $responder, private ResourceManager $resourceManager){}

    #[NoReturn] public function __invoke(Request $request, string $resource): Response
    {
        $form = $this->formsManager->createForm($resource);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $this->resourceManager->newResource($form->getData());
        }
        $viewModel = new AddViewModel(form: $form, message: "Insérer : ${resource}", errors: []);
        return $this->responder->present($viewModel);
    }

}
