<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\PatientAddress;
use Doctrine\DBAL\Types\StringType;
use PhpParser\Node\Stmt\UseUse;


class PatientAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add(
                'streetnumber',
                NumberType::class,
                [
                    'label' => 'FORM.PATIENTADDRESS.STREETNUMBER',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENTADDRESS.STREETNUMBER',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'zips',
                NumberType::class,
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
           );
    }
     public function configureOptions(OptionsResolver $resolver)
     {
         $resolver->setDefaults(array(
             'data_class' => PatientAddress::class,
         ));

    }
}