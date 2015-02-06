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

class IndexController extends AbstractActionController
{
	
	private $phoneForm;
	
	public function __construct($phoneForm) {
		$this->phoneForm = $phoneForm;
	}
    
    public function listAction() {
    	echo "munem";
    }
    
    public function createAction() {
    	
    	return new ViewModel(array(
    			'form' => $this->phoneForm,
    	));
    }
}
