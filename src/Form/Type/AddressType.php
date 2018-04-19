<?php
namespace App\Form\Type;

use App\Entity\AddressDoctors;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
   {
       $addressDoctor = new AddressDoctors();
       
       $builder->add('zip')
                ->add('country')
                ->add('canton')
                ->add('locality')
                ->add('municipality')
                ->add('number')
                ->add('canton');
        
       $form = $builder->getForm();
   }
}

