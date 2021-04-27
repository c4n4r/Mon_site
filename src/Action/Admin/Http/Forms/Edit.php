<?php


namespace App\Action\Admin\Http\Forms;


use App\Domain\Admin\ResourceManager;
use App\Infrastructure\Flash\FlashMessageManagerInterface;
use App\Infrastructure\Form\FormsFactoryInterface;
use App\Responder\Admin\Http\Forms\Resource\ResourceFormViewModel;
use App\Responder\TwigResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use function intval;

class Edit
{

    public function __construct(private FormsFactoryInterface $formsManager,
                                private TwigResponderInterface $responder,
                                private ResourceManager $resourceManager,
                                private FlashMessageManagerInterface $flashMessageManager,
                                private RouterInterface $router){}


    /**
     * @throws \Exception
     */
    public function __invoke(Request $request, $resource, $id)
    {
        $entityToEdit = $this->resourceManager->getResourceById(intval($id), $resource);
        $form = $this->formsManager->createForm($resource, $entityToEdit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $res = $this->resourceManager->updateResource($entityToEdit);
           if ($res) $this->flashMessageManager->addFLash('success', "la ${resource} a été modifiée");
           $this->router->generate('edit_taxonomy', ['resource' => $resource, 'id' => $res->getId()]);
        }
        $viewModel = new ResourceFormViewModel(form: $form, label: "Modifier : ${resource}" , errors: []);
        return $this->responder->present($viewModel);
    }

}
