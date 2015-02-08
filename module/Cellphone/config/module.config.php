<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 4, 2015
 * @ description : Cellphone module configuration
 */
return array(
    'router' => array(
        'routes' => array(
            'cellphone' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cellphone[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Cellphone\Controller',
                        'controller' => 'Index',
                        'action' => 'list'
                    )
                )
            )
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'Cellphone_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . 'Cellphone/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Cellphone\Entity' => 'Cellphone_driver'
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);
