<?php

namespace Ainias\CodeManagement;

use Ainias\CodeManagement\Factory\Model\Manager\CodeManagerFactory;
use Ainias\CodeManagement\Model\Manager\CodeManager;

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'factories' => array(
            'doctrine.entitymanager.'.__NAMESPACE__ => new \DoctrineORMModule\Service\EntityManagerFactory(__NAMESPACE__),
            'doctrine.connection.'.__NAMESPACE__ => new \DoctrineORMModule\Service\DBALConnectionFactory(__NAMESPACE__),

            CodeManager::class => CodeManagerFactory::class,
        ),
    ),
);