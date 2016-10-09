<?php

namespace Ainias\CodeManagement;

use Ainias\Core\Connections\MyConnection;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

$lastNamespacePart = explode("\\", __NAMESPACE__)[1];
return array(
    'doctrine' => array(
//        'connection' => array(
//            $lastNamespacePart => array(
//                'wrapperClass' => MyConnection::class,
//                'params' => array(
////                    'dbname' => 'silas_'.$lastNamespacePart,
//                )
//            )
//        ),
        'driver' => array(
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Model' => 'entities_'.$lastNamespacePart
                ),
            ),
            'entities_'.$lastNamespacePart => array(
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Model',
                )
            )
        ),
        'entitymanager' => array(
            $lastNamespacePart => array(
                'connection' => 'default',
            )
        ),
    ),
);
