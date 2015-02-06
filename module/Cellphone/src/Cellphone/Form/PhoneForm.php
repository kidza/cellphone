<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 6, 2015
 * @ description : 
 */


namespace Cellphone\Form;

use Zend\Form\Form;
// use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PhoneForm extends Form implements ObjectManagerAwareInterface
{
	
	public function init()
	{
		$this->add(
				array(
						'type' => 'objectselect',
						'name' => 'Manufacturer',
						'options' => array(
								'object_manager' => $this->getObjectManager(),
								'target_class'   => 'Cellphone\Entity\PhoneManufacturer',
								'property'       => 'name',
								'label'			 => 'Manufacturer'
								/*'is_method' => true,
								'find_method'        => array(
										'name'   => 'findAll',
										'params' => array(
												'orderBy'  => array('name' => 'ASC'),
										),
								),*/
						),
				)
		);
	}
	

	public function __construct($name = null)
	{
		parent::__construct('');

		$this->setAttribute('method', 'post');

		$this->add(array(
				'name' => 'Model',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Model',
				),
		));

		$this->add(array(
				'name' => 'description',
				'type' => 'Zend\Form\Element\Textarea',
				'attributes' => array(
				),
				'options' => array(
						'label' => 'Description',
						'placeholder' => 'Type something...',
				),
		));

		$this->add(array(
				'name' => 'Active',
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Active',
						'value_options' => array(
								'0' => 'Yes',
								'1' => 'No',
						),
				),
		));

		$this->add(array(
				'name' => 'Weight',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Weight',
				),
		));

		$this->add(array(
				'name' => 'Memory',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Memory',
				),
		));

		$this->add(array(
				'name' => 'Size',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Size',
				),
		));

	}
	

	public function setObjectManager(ObjectManager $objectManager)
	{
		$this->objectManager = $objectManager;
	}
	
	public function getObjectManager()
	{
		return $this->objectManager;
	}
}