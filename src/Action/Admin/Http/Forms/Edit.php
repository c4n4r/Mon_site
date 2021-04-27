<?php


namespace App\Action\Admin\Http\Forms;


use App\Domain\Admin\ResourceManager;
use App\Infrastructure\Form\FormsFactoryInterface;
use App\Responder\Admin\Http\Forms\Resource\ResourceFormResponder;
use Symfony\Component\HttpFoundation\Request;

class Edit
{

    public function __construct(private FormsFactoryInterface $formsManager,private ResourceFormResponder $responder, private ResourceManager $resourceManager){}


    public function __invoke(Request $request, $resource, $name)
    {
        $this->resourceManager->getResource($name, $resource);
    }

}
