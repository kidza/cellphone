<?php

namespace Cellphone;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Cellphone\Controller\IndexController;

class Module {
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	public function getAutoloaderConfig() {
		return array (
				'Zend\Loader\StandardAutoloader' => array (
						'namespaces' => array (
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__ 
						) 
				) 
		);
	}
	public function getFormElementConfig() {
		return array (
				'invokables' => array (
						'CellphoneForm' => 'Cellphone\Form\PhoneForm' 
				),
				'initializers' => array (
						'ObjectManagerInitializer' => function ($element, $formElements) {
							// look if the form implements the ObjectManagerAwareInterface
							if ($element instanceof ObjectManagerAwareInterface) {
								// locate the EntityManager using the serviceLocator
								$services = $formElements->getServiceLocator ();
								$entityManager = $services->get ( 'Doctrine\ORM\EntityManager' );
								// set the forms EntityManager or Objectmanager, 2 names for the same thing
								$element->setObjectManager ( $entityManager );
							}
						} 
				) 
		);
	}
	
	public function getControllerConfig()
	{
		return array(
				'factories' => array(
						'Cellphone\Controller\Index' => function ($sm) {
							$locator = $sm->getServiceLocator();
							$phoneForm = $locator->get('FormElementManager')->get('CellphoneForm');
							$controller = new IndexController($phoneForm);
							return $controller;
						},
				),
		);
	}
}
