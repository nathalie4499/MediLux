<?php
namespace App\Form\Type;

use App\Entity\AddressDoctors;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options) 
   {
       $builder->add('zip', TextType::class)
               ->add('country', TextType::class)
               ->add('canton', TextType::class)
               ->add('locality', TextType::class)
               ->add('municipality', TextType::class)
               ->add('number', TextType::class);
      
       if ($options['stateless'])
       {
           $builder->add('submit', SubmitType::class,
               ['attr' => ['class' => 'btn btn-success btn-block']
               ]);
       }
     
   }
   /**
    * {@inheritDoc}
    * @see \Symfony\Component\Form\AbstractType::configureOptions()
    */
   public function configureOptions(OptionsResolver $resolver)
   {
       $resolver->setDefault('data_type', AddressDoctors::class);
       $resolver->setDefault('stateless', false);
       
   }
   
}

