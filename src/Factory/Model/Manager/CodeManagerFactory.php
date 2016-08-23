<?php

namespace Ainias\CodeManagement\Factory\Model\Manager;

use Ainias\CodeManagement\Model\Code;
use Ainias\CodeManagement\Model\Manager\CodeManager;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CodeManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ContainerInterface $serviceLocator)
    {
        /** @var EntityManager $em */
        $em = $serviceLocator->get('doctrine.entitymanager.CodeManagement');

        return new CodeManager($em->getRepository(Code::class));
    }
} 