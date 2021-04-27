<?php


namespace App\Domain\Admin;


use Doctrine\ORM\EntityManagerInterface;
use function get_class;
use function ucfirst;

class ResourceManager
{

    public function __construct(private EntityManagerInterface $em){}
    function newResource($resource) {
        $this->em->persist($resource);
        $this->em->flush();
        return($resource);
    }

    public function getResource(string $name, string $type) {
            $entityName = 'App\Domain\Blog\Entity\\'.ucfirst($type);
            $repository = ($this->em->getRepository($entityName));
            $resource = $repository->findOneBy(['name' => $name]);
            if ($resource)
                return $resource;
    }

}
