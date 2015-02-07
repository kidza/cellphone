<?php

/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 6, 2015
 * @ description : 
 */
namespace Cellphone\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cellphone\Entity\Cellphone;

class IndexController extends AbstractActionController 
{
    private $phoneForm;
    
    private $cellphoneService;
    
    public function __construct($phoneForm, $cellphoneService) {
        $this->phoneForm = $phoneForm;
        $this->cellphoneService = $cellphoneService;
    }
    
    public function listAction() {
        $phones = $this->cellphoneService->getAllPhones();
        return new ViewModel ( array (
                'phones' => $phones 
        ) );
    }
    
    public function viewAction() {
        $phoneId = $this->params('id');
        $cellphone = $this->cellphoneService->getCellphone ( $phoneId );
        
        return new ViewModel ( array (
                'phone' => $cellphone
            )
        );
    }
    
    public function deleteAction() {
        $phoneId = $this->params('id');
        $cellphone = $this->cellphoneService->deleteCellphone($phoneId);
        
        return new ViewModel();
    }
    
    public function createAction() {
        $showSuccessMessage = false;
        $form = $this->phoneForm;
        $cellphone = new Cellphone ();
        $form->bind ( $cellphone );
        
        if ($this->getRequest ()->isPost ()) {
            $form->setData ( $this->getRequest ()->getPost () );
            
            if ($form->isValid ()) {
                $this->cellphoneService->save ( $cellphone );
                $showSuccessMessage = true;
            }
        }
        
        return new ViewModel ( array (
                'form' => $form,
                'showSuccessMessage' => $showSuccessMessage 
        ) );
    }
    
    public function editAction() {
        $showSuccessMessage = false;
        $form = $this->phoneForm;
        $phoneId = $this->params ('id');
        $cellphone = $this->cellphoneService->getCellphone ( $phoneId );
        $form->bind ( $cellphone );
        
        if ($this->getRequest ()->isPost ()) {
            $form->setData ( $this->getRequest ()->getPost () );
            if ($form->isValid ()) {
                $this->cellphoneService->save ( $cellphone );
                $showSuccessMessage = true;
            }
        }
        
        return new ViewModel ( array (
                'form' => $form,
                'showSuccessMessage' => $showSuccessMessage 
        ) );
    }
}
