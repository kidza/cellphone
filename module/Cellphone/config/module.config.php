<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array (
		'router' => array(
				'routes' => array(
						
						// The following is a route to simplify getting started creating
						// new controllers and actions without needing to create a new
						// module. Simply drop new controllers in, and you can access them
						// using the path /application/:controller/:action
						'cellphone' => array(
								'type'    => 'Literal',
								'options' => array(
										'route'    => '/cellphone',
										'defaults' => array(
												'__NAMESPACE__' => 'Cellphone\Controller',
												'controller'    => 'Index',
												'action'        => 'list',
										),
								),
								'may_terminate' => true,
								'child_routes' => array(
										'default' => array(
												'type'    => 'Segment',
												'options' => array(
														'route'    => '/[:controller[/:action]]',
														'constraints' => array(
																'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
																'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
														),
														'defaults' => array(
														),
												),
										),
								),
						),
				),
		),

		'doctrine' => array (
				'driver' => array (
						'Cellphone_driver' => array (
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array (
										__DIR__ . '/../src/' . 'Cellphone/Entity' 
								) 
						),
						'orm_default' => array (
								'drivers' => array (
										'Cellphone\Entity' => 'Cellphone_driver' 
								) 
						) 
				) 
		),
		
		'service_manager' => array (
				'abstract_factories' => array (
						'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
						'Zend\Log\LoggerAbstractServiceFactory' 
				) 
		),
		/*'controllers' => array (
				'invokables' => array (
						'Cellphone\Controller\Index' => 'Cellphone\Controller\IndexController' 
				) 
		),*/
		'view_manager' => array (
				'template_path_stack' => array (
						__DIR__ . '/../view' 
				) 
		) 
);
