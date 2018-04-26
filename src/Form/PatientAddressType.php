<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryBuilder;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\PatientAddress;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PatientAddressType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('streetnumber', TextType::class, [
            'label' => 'FORM.PATIENT.STREETNUMBER',
            'attr' => [
                'placeholder' => 'MLPATIENT.STREETNUMBER',
                'class' => 'form-control'
            ]
        ])
            ->add('street', TextType::class, [
            'label' => 'FORM.PATIENT.STREET',
            'attr' => [
                'placeholder' => 'MLPATIENT.STREET',
                'class' => 'form-control'
            ]
        ])
            ->add('locality', TextType::class, [
            'label' => 'FORM.PATIENT.LOCALITY',
            'attr' => [
                'placeholder' => 'MLPATIENT.LOCALITY',
                'class' => 'form-control'
            ]    
        ])
            ->add('municipality', TextType::class, [
            'label' => 'FORM.PATIENT.MUNICIPALITY',
            'attr' => [
                'placeholder' => 'MLPATIENT.MUNICIPALITY',
                'class' => 'form-control'
            ]
        ])
            ->add('canton', TextType::class, [
            'label' => 'FORM.PATIENT.CANTON',
            'attr' => [
                'placeholder' => 'MLPATIENT.CANTON',
                'class' => 'form-control'
            ]
        ])               
            ->add('country', TextType::class, [
            'label' => 'FORM.PATIENT.COUNTRY',
            'attr' => [
                'placeholder' => 'MLPATIENT.COUNTRY',
                'class' => 'form-control'
            ]
        ])
            ->add('zips', TextType::class, [
            'label' => 'FORM.PATIENT.ZIP',
            'attr' => [
                'placeholder' => 'MLPATIENT.ZIP',
                'clas' => 'form-control'
            ]
        ]);

    }
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::configureOptions()
     */
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', PatientAddress::class);
        $resolver->setDefault('label', false);

    }

}