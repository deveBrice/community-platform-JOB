<?php

namespace App\DataFixtures;

use App\Entity\Comment;
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
            $content->setDescription($this->faker->text);
            $content->setAuthor($user);
            $content->setState('REVIEW_ASKED');
            $manager->persist($content);

            $content = new Content();
            $content->setTitle($this->faker->sentence);
            $content->setDescription($this->faker->text);
            $content->setAuthor($user);
            $content->setState('APPROVED');
            $manager->persist($content);

            $content = new Content();
            $content->setTitle($this->faker->sentence);
            $content->setDescription($this->faker->text);
            $content->setAuthor($user);
            $content->setState('REJECTED');
            $manager->persist($content);

            $content = new Content();
            $content->setTitle($this->faker->sentence);
            $content->setDescription($this->faker->text);
            $content->setAuthor($user);
            $content->setState('PUBLISHED');
            $manager->persist($content);

            $comment = new Comment();
            $comment->setIdContent($content);
            $comment->setIdUser($user);
            $comment->setContent('This is my own comment !');
            $manager->persist($comment);
        }

        $admin = new User();
        $admin->setFirstname($this->faker->firstName);
        $admin->setLastname($this->faker->lastName);
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setPassword($this->encoder->encodePassword($admin, 'admin'));
        $manager->persist($admin);

        $reviewer = new User();
        $reviewer->setFirstname($this->faker->firstName);
        $reviewer->setLastname($this->faker->lastName);
        $reviewer->setEmail('rev@rev.fr');
        $reviewer->setRoles(array('ROLE_REVIEWER'));
        $reviewer->setPassword($this->encoder->encodePassword($reviewer, 'rev'));
        $manager->persist($reviewer);

        $publisher = new User();
        $publisher->setFirstname($this->faker->firstName);
        $publisher->setLastname($this->faker->lastName);
        $publisher->setEmail('pub@pub.fr');
        $publisher->setRoles(array('ROLE_PUBLISHER'));
        $publisher->setPassword($this->encoder->encodePassword($publisher, 'pub'));
        $manager->persist($publisher);

        $manager->flush();
    }
}
