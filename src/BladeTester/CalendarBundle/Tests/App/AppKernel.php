<?php

namespace BladeTester\CalendarBundle\Tests\App;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;  

class AppKernel extends Kernel
{

    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \BladeTester\CalendarBundle\BladeTesterCalendarBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
        );
    }

    /**
     * @{inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config.yml');
    }
}