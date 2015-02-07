<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 6, 2015
 * @ description : 
 */


namespace Cellphone\Form;

use Zend\Form\Form;
use Cellphone\Entity\Cellphone;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PhoneForm extends Form implements ObjectManagerAwareInterface
{
    private $objectManager;
	
	public function init()
	{
		$this->setAttribute('method', 'post');
		$hydrator = new DoctrineHydrator($this->objectManager);
		$this->setHydrator($hydrator);
		$this->setObject(new \Cellphone\Entity\Cellphone());
		
		$this->add(
				array(
						'type' => 'objectselect',
						'name' => 'manufacturer',
						'options' => array(
								'object_manager' => $this->getObjectManager(),
								'target_class'   => '\Cellphone\Entity\PhoneManufacturer',
								'property'       => 'name',
								'label'			 => 'Manufacturer',
								'is_method' => true,
								'find_method'        => array(
										'name'   => 'findBy',
										'params' => array(
										        'criteria' => array(),
												'orderBy'  => array('name' => 'ASC')
										)
								)
						)
				)
		);
	}

	public function __construct($name = null)
	{
		parent::__construct('');
		
		$cellphoneFomFilter = new PhoneFormValidator();
		
		$this->setInputFilter($cellphoneFomFilter->getInputFilter());

		$this->add(array(
				'name' => 'model',
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
				'name' => 'status',
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Active',
						'value_options' => array(
								'1' => 'Yes',
								'0' => 'No',
						),
				),
		));

		$this->add(array(
				'name' => 'weight',
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
				'name' => 'memory',
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
				'name' => 'size',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Type something...',
						'required' => 'required',
				),
				'options' => array(
						'label' => 'Size',
				),
		));
		
		$this->add(array(
		        'name' => 'submit',
		        'attributes' => array(
		                'type'           => 'submit',
		                'value'          => 'Submit',
		                'id'             => 'submitbutton',
		                'data-toggle'    => 'tooltip',
		                'title'          => 'Submit',
		        )
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