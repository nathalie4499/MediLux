<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\PatientAddress;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;


class PatientAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $patientaddress = new PatientAddress();
        
        $builder
            ->add(
                'streetnumber',
                StringType::class,
                [
                    'label' => 'FORM.PATIENTADDRESS.STREETNUMBER',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENTADDRESS.STREETNUMBER',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'zips',
                StringType::class,
                [
                    'label' => 'FORM.PATIENTADDRESS.ZIP',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENTADDRESS.ZIP',
                        'class' => 'form-control'
                    ]       
                ]
             )->add(
                 'country',
                 StringType::class,
                 [
                     'label' => 'FORM.PATIENTADDRESS.COUNTRY',
                     'attr' => [
                         'placeholder' => 'FORM.PATIENTADDRESS.COUNTRY',
                         'class' => 'form-control'
                     ]
                 ]   
             ) ->add(
                 'telephone',
                 TextType::class,
                 [
                     'label' => 'MLPATIENT.TELEPHONE',
                     'attr' => [
                         'placeholder' => 'MLPATIENT.TELEPHONE',
                         'class' => 'form-control'
                     ]
                 ]
                 ) ;
             $form = $builder->getForm();
    }
     public function configureOptions(OptionsResolver $resolver)
     {
         $resolver->setDefaults(array(
             'data_class' => PatientAddress::class,
             //'formular_patient_address' nom du formulaire
         ));

    }
}