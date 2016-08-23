<?php

namespace CodeManagement;

use CodeManagement\Controller\IndexController;
use Zend\Router\Http\Segment;

return array(
    'router' => [
        'routes' => [
            'codeManagement' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/c',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'doCodeAction' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:code',
                            'constrains' => [
                                'code' => '[a-zA-Z0-9]{50,255}'
                            ],
                            'defaults' => [
                                'controller' => IndexController::class,
                                'action' => 'doCode',
                                'resource' => 'default',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
);