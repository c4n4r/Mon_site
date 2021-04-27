<?php


namespace App\Domain\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use function ucfirst;

class ResourceManager
{

    public function __construct(private EntityManagerInterface $em){}
    function newResource($resource) {
        $this->em->persist($resource);
        $this->em->flush();
        return($resource);
    }
    /**
     * @throws Exception
     */
    public function getResourceById(int $id, string $type): ?object
    {
        $entityName = 'App\Domain\Blog\Entity\\'.ucfirst($type);
        $repository = ($this->em->getRepository($entityName));
        $resource = $repository->findOneBy(['id' => $id]);
        if ($resource)
            return $resource;
        else throw(new Exception("no entity found for ${type} at id : ${id}"));
    }

    public function updateResource(object $resource): object
    {
        $this->em->persist($resource);
        $this->em->flush();
        return $resource;
    }

    public function deleteResource(object $resource)
    {
        $this->em->remove($resource);
    }
}
