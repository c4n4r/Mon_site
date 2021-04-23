<?php

namespace App\DataFixtures;

use App\Domain\Model\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordEncoderInterface $passwordEncoder){}

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setNickname('c4n4r')
            ->setName('Hadrien')
            ->setSurname('Delphin')
            ->setEmail('delphin.hadrien@gmail.com')
            ->setPassword($this->passwordEncoder->encodePassword($user, 'carotte1988'))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();
    }
}
