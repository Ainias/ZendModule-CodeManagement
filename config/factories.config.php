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
            CodeManager::class => CodeManagerFactory::class,
        ),
    ),
);