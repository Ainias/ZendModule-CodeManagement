<?php

namespace Ainias\CodeManagement;

use Ainias\Core\Connections\MyConnection;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return array(
    'doctrine' => array(
        'driver' => array(
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Model' => 'entities_default'
                ),
            ),
            'entities_default' => array(
                'paths' => array(
                    __DIR__ . '/../src/Model',
                )
            )
        ),
    ),
);
