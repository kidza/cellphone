<?php
/**
 * @ copyright Solera
 * @ author Ivan Stankovic 
 * @ created Feb 6, 2015
 * @ description : 
 */

namespace Cellphone\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PhoneFormValidator implements InputFilterAwareInterface
{
	protected $inputFilter;

	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}

	public function getInputFilter()
	{
		if (!$this->inputFilter)
		{
			$inputFilter = new InputFilter();
			$factory = new InputFactory();


			$inputFilter->add($factory->createInput([
					'name' => 'model',
					'required' => true,
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
					),
					]));

			$inputFilter->add($factory->createInput([
					'name' => 'description',
					'required' => false,
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
					),
					]));

			$inputFilter->add($factory->createInput([
					'name' => 'status',
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array (
									'name' => 'InArray',
									'options' => array(
											'haystack' => array(0,1),
											'messages' => array(
													'notInArray' => 'undefined'
											),
									),
							),

					),
					]));

			$inputFilter->add($factory->createInput([
					'name' => 'weight',
					'required' => true,
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
					),
					]));

			$inputFilter->add($factory->createInput([
					'name' => 'memory',
					'required' => true,
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
					),
					]));

			$inputFilter->add($factory->createInput([
					'name' => 'size',
					'required' => true,
					'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
					),
					]));

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}
}