<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Entity\ActiveProblems;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ActiveProblemsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $activeproblems = new ActiveProblems();
        
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

            $form = $builder->getForm();
            


    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ActiveProblems::class,
        ));
        
    }
}

