<?php

namespace App\DataFixtures;

use App\Entity\Content;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    private $faker;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager)
    {
        for($i=0; $i<10; $i++){
            $user = new User();
            $user->setFirstname($this->faker->firstName);
            $user->setLastname($this->faker->lastName);
            $user->setEmail($this->faker->email);
            $user->setPassword($this->encoder->encodePassword($user, 'cpjob'));
            $manager->persist($user);

            $content = new Content();
            $content->setTitle($this->faker->sentence);
            $content->setDescritption($this->faker->text);
            $content->setAuthor($user);
            $content->setState('REVIEW_ASKED');
            $manager->persist($content);
        }

        $admin = new User();
        $admin->setFirstname($this->faker->firstName);
        $admin->setLastname($this->faker->lastName);
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));
        $admin->setPassword($this->encoder->encodePassword($admin, 'admin'));
        $manager->persist($admin);

        $manager->flush();
    }
}
