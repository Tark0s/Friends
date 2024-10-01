<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $user = new User();
            $user->setEmail('email'.$i.'@gmail.com');
            $user->setPassword($this->hasher->hashPassword($user, 'password'.$i));
            $user->setRoles(['ROLE_USER']);
            $user->setFirstName('Name'.$i);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
