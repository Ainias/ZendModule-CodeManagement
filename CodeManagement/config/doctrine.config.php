<?php

namespace CodeManagement;

return array(
    'doctrine' => array(
        'connection' => array(
            __NAMESPACE__ => array(
                'wrapperClass' => 'Application\Connections\MyConnection',
                'params' => array(
                    'dbname' => 'silas_'.__NAMESPACE__,
                )
            )
        ),
        'driver' => array(
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Model' => 'entities_'.__NAMESPACE__
                ),
            ),
            'entities_'.__NAMESPACE__ => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Model',
                )
            )
        ),
        'entitymanager' => array(
            __NAMESPACE__ => array(
                'connection' => __NAMESPACE__,
            )
        ),
    ),
);
