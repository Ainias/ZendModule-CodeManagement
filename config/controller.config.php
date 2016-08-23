<?php

namespace Ainias\CodeManagement;

use Ainias\Core\Factory\Controller\ServiceActionControllerFactory;

return array(
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => ServiceActionControllerFactory::class,
        ],
    ],
);