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
            'doctrine.entitymanager.CodeManagement' => new \DoctrineORMModule\Service\EntityManagerFactory(__NAMESPACE__),
            'doctrine.connection.CodeManagement' => new \DoctrineORMModule\Service\DBALConnectionFactory(__NAMESPACE__),

            CodeManager::class => CodeManagerFactory::class,
        ),
    ),
);