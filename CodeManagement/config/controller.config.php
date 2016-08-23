<?php

namespace CodeManagement;

use Application\Factory\Controller\ServiceActionControllerFactory;

return array(
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => ServiceActionControllerFactory::class,
        ],
    ],
);