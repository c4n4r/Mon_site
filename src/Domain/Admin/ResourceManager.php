<?php


namespace App\Domain\Admin;


use Doctrine\ORM\EntityManagerInterface;
use function get_class;

class ResourceManager
{

    public function __construct(private EntityManagerInterface $em){}

    function newResource($resource) {

        $resourceType = get_class($resource);
        $this->em->persist($resource);
        $this->em->flush();

        return($resource);

    }

}
