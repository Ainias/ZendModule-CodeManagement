<?php

namespace Ainias\CodeManagement;

use Ainias\CodeManagement\Factory\Model\Manager\CodeManagerFactory;
use Ainias\CodeManagement\Model\Manager\CodeManager;

$lastNamespacePart = explode("\\", __NAMESPACE__)[1];

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'factories' => array(
            'doctrine.entitymanager.'.$lastNamespacePart => new \DoctrineORMModule\Service\EntityManagerFactory($lastNamespacePart),
            'doctrine.connection.'.$lastNamespacePart => new \DoctrineORMModule\Service\DBALConnectionFactory($lastNamespacePart),

            CodeManager::class => CodeManagerFactory::class,
        ),
    ),
);