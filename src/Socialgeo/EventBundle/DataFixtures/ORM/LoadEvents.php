<?php

namespace Socialgeo\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Socialgeo\EventBundle\Entity\Event;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $event = new Event();
        $event->setName('Laurijn');
        $event->setLocation('Ghent');
        $event->setTime(new \DateTime('tomorrow noon'));
        $event->setDetails('awesome');
        $event->setImagename('foo.jpg');
        $manager->persist($event);

        $event2 = new Event();
        $event2->setName('Stijn');
        $event2->setLocation('Lommel');
        $event2->setTime(new \DateTime('tomorrow noon'));
        $event2->setDetails('awesome');
        $event2->setImagename('foo.jpg');
        $manager->persist($event2);

        $manager->flush();
    }
}