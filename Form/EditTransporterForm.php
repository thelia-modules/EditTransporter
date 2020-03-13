<?php

/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 07/09/15
 * Time: 12:29.
 */

namespace EditTransporter\Form;

use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Form\BaseForm;

class EditTransporterForm extends BaseForm
{
    /**
     * in this function you add all the fields you need for your Form.
     * Form this you have to call add method on $this->formBuilder attribute :.
     *
     * $this->formBuilder->add("name", "text")
     *   ->add("email", "email", array(
     *           "attr" => array(
     *               "class" => "field"
     *           ),
     *           "label" => "email",
     *           "constraints" => array(
     *               new \Symfony\Component\Validator\Constraints\NotBlank()
     *           )
     *       )
     *   )
     *   ->add('age', 'integer');
     */
    protected function buildForm()
    {
        $this->formBuilder
            ->add('transporter', 'integer', array(
                'constraints' => array(
                    new NotBlank(),
                ),
                'label' => 'transporter',
                'label_attr' => array(
                    'for' => 'transporter',
                ),
                'required' => true,
            ));
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return 'edit_transporter';
    }
}
