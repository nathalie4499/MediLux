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
       //$builder = $factory->createBuilder(FormType::class, $doctor);
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
        //fields for address table
       ->add(
           'address', CollectionType::class,
           [
               'entry_type' => AddressDoctors::class,
               'entry_options' => ['label' => false]
           ]
           )
       //end address
       
       ->add(
           'submit', SubmitType::class,
           ['attr' => [
               'class' => 'btn btn-success btn-block',
               'stateless' => true
           ],
               'label' => 'FORM.ADDRESSBOOK.SUBMIT'
           ]
           );
       
       //         //form to fill the address
       //         $addressDoctor = new AddressDoctors();
       //         $builder = $factory->createBuilder(FormType::class, $addressDoctor);
       //         $builder->add(
       //             'zip', TextType::class,
       //             ['label' => 'FORM.ADDRESSBOOK.ZIP']
       //             )
       //             ->add(
       //                 'submit', SubmitType::class,
       //                 ['attr' => ['class' => 'btn btn-success btn-block'],
       //                     'label' => 'FORM.ADDRESSBOOK.SUBMIT'
       //                 ]
       //                 );
       //         //END form to fill the address
   }
}

