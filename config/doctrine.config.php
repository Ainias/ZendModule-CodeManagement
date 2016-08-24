<?php

namespace Ainias\CodeManagement;

$lastNamespacePart = explode("\\", __NAMESPACE__)[1];
return array(
    'doctrine' => array(
        'connection' => array(
            $lastNamespacePart => array(
                'wrapperClass' => 'Application\Connections\MyConnection',
                'params' => array(
                    'dbname' => 'silas_'.$lastNamespacePart,
                )
            )
        ),
        'driver' => array(
            'orm_default' => array(
                'drivers' => array(
                    $lastNamespacePart.'\Model' => 'entities_'.$lastNamespacePart
                ),
            ),
            'entities_'.$lastNamespacePart => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Model',
                )
            )
        ),
        'entitymanager' => array(
            $lastNamespacePart => array(
                'connection' => $lastNamespacePart,
            )
        ),
    ),
);
