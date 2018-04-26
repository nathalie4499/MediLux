<?php
namespace App\Form\Type;

use App\Entity\Doctors;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DoctorType extends AbstractType
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options) 
   {
       $builder->add(
                   'firstname', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.FIRSTNAME']
                     )
               ->add(
                   'lastname', TextType::class,
                   ['required' => false,
                       'label' => 'FORM.ADDRESSBOOK.LASTNAME',
                   ]
                   )
               ->add(
                   'specialization', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.SPECIALIZATION']
                   )
               ->add(
                   'telwork', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.TELWORK']
                   )
               ->add(
                   'telpriv', TextType::class,
                   ['required' => false,
                       'label' => 'FORM.ADDRESSBOOK.TELPRIV',
                   ]
                   )
               ->add(
                   'mobile', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.MOBILE']
                   )
               ->add(
                   'email', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.EMAIL']
                   )
               ->add(
                   'fax', TextType::class,
                   ['required' => false,
                       'label' => 'FORM.ADDRESSBOOK.FAX',
                   ]
                   )
               ->add(
                   'language', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.LANGUAGE']
                   )
               ->add(
                   'title', TextType::class,
                   ['label' => 'FORM.ADDRESSBOOK.TITLE']
                   )
               //address collection type
               ->add(
                   'address', CollectionType::class,
                   [
                       'entry_type' => AddressType::class,
                       'allow_add' => true
                   ]
                   );
               //end address collection type
               
      
       if ($options['stateless'])
       {
           $builder->add('submit', SubmitType::class,
               ['attr' => ['class' => 'btn btn-success btn-block'],
                   'label' => 'FORM.ADDRESSBOOK.SUBMIT'
               ]);
       }
     
   }
   /**
    * {@inheritDoc}
    * @see \Symfony\Component\Form\AbstractType::configureOptions()
    */
   public function configureOptions(OptionsResolver $resolver)
   {
       $resolver->setDefault('data_class', Doctors::class);
       $resolver->setDefault('stateless', false);
       
   }
   
}

