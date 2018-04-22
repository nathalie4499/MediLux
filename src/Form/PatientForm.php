<?php
namespace App\Form;

use App\Entity\Patient;
use App\Entity\PatientAddress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientForm extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
        ->add(
            'ssn',
            NumberType::class,
            [
                'required' => true,
                'label' => 'SSN',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.SSN',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'age',
            NumberType::class,
            [
                'label' => 'FORM.PATIENT.AGE',
                'attr' => [
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'givenname',
            TextType::class,
            [
                'label' => 'FORM.PATIENT.GIVENNAME',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.GIVENNAME',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'birthname',
            TextType::class,
            [
                'required' => true,
                'label' => 'FORM.PATIENT.BIRTHNAME',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.BIRTHNAME',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'maritalname',
            TextType::class,
            [
                'label' => 'FORM.PATIENT.MARITALNAME',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.MARITALNAME',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'nationality',
            TextType::class,
            [
                'label' => 'FORM.PATIENT.NATIONALITY',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.NATIONALITY',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'language',
            TextType::class,
            [
                'label' => 'FORM.PATIENT.LANGUAGE',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.LANGUAGE',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'telephone',
            TextType::class,
            [
                'label' => 'FORM.PATIENT.TELEPHONE',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.TELEPHONE',
                    'class' => 'form-control'
                ]
            ]
        );
        
        $builder->add(
            'patientaddresslist', CollectionType::class, array
            (
                'entry_type' => PatientAddressType::class,
                'entry_options' => array('label' => false),
                
        ));
        
        $builder->add(
            'activeproblemslist', CollectionType::class, array
            (
                'entry_type' => ActiveProblemsForm::class,
                'entry_options' => array('label' => false),
                
        ));
        $builder->add(
            'submit',
            SubmitType::class,
            [
                'attr' => [
                    'class' => 'btn-lbock btn-success'
                ]
            ]
            )
       ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Patient::class,
        ));
    }
}
        