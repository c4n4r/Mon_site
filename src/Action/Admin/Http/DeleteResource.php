<?php


namespace App\Action\Admin\Http;


use App\Domain\Admin\ResourceManager;
use App\Infrastructure\Flash\FlashMessageManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class DeleteResource
{

    public function __construct(private ResourceManager $resourceManager,
                                private FlashMessageManagerInterface $flashMessageManager,
                                private RouterInterface $router){}

    /**
     * @throws \Exception
     */
    public function __invoke(Request $request, $resource, $id)
    {
        $toDelete = $this->resourceManager->getResourceById($id, $resource);
        $this->resourceManager->deleteResource($toDelete);
        $this->flashMessageManager->addFLash('success', "la resource ${resource} a bien été supprimée");
        $this->router->generate($request->get('dashboard'));
    }
}
