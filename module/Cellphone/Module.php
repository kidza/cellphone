<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic
 * @ created Feb 4, 2015
 * @ description : Cellphone module configuration
 */

namespace Cellphone;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Cellphone\Controller\IndexController;
use Cellphone\Form\PhoneForm;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getFormElementConfig()
    {
        return array(
            'factories' => array(
                'Cellphone\Form\PhoneForm' => function ($sm)
                {
                    $serviceLocator = $sm->getServiceLocator();
                    $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
                    $form = new PhoneForm();
                    $form->setObjectManager($entityManager);
                    return $form;
                }
            )
        );
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'Cellphone\Controller\Index' => function ($sm)
                {
                    $serviceLocator = $sm->getServiceLocator();
                    $phoneForm = $serviceLocator->get('FormElementManager')->get('Cellphone\Form\PhoneForm');
                    $cellphoneService = $serviceLocator->get('Cellphone\Service\CellphoneService');
                    $controller = new IndexController($phoneForm, $cellphoneService);
                    return $controller;
                }
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Cellphone\Service\CellphoneService' => function ($sm)
                {
                    $entityManager = $sm->get('Doctrine\ORM\EntityManager');
                    $cellphoneService = new Service\CellphoneService($entityManager);
                    return $cellphoneService;
                }
            )
        );
    }
}
