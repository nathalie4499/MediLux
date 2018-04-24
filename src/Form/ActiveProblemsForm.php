<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\ActiveProblems;
use App\Entity\PatientAddress;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActiveProblemsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder = $factory->createBuilder(FormType::class, $patient);
        $builder->add(
            'title', TextareaType::class,
            [
                'label' => 'FORM.ACTIVEPROBLEMS.TITLE',
                'attr' => [
                    'placeholder' => 'FORM.ACTIVEPROBLEMS.TITLE',
                    'class' => 'form-control'
                ]
            ]
        )->add(
            'description',
            TextareaType::class,
            [
                'label' => 'FORM.ACTIVEPROBLEMS.DESCRIPTION',
                'attr' => [
                    'placeholder' => 'FORM.ACTIVEPROBLEMS.DESCRIPTION',
                    'class' => 'form-control'
                ]
            ]
       );
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ActiveProblems::class,
        ));
        
    }
}

