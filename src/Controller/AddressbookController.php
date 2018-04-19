<?php

namespace App\Controller;

use App\Entity\Patient;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Doctors;
use App\Repository\DoctorsRepository;
use App\Entity\AddressDoctors;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Repository\AddressDoctorsRepository;
use App\Form\Type\AddressType;


class AddressbookController extends Controller
{
    public function addressbookList(
                                     Environment $twig,
                                     DoctorsRepository $repository,
                                     AddressDoctorsRepository $addressrepo
                                    )
    {
        return new Response(
            $twig->render(
                'Modules/Addressbook/addressbookList.html.twig', 
                [
                    'doctor' => $repository->findAll(),
                    'address' => $addressrepo->findAll()
                ]
                )
            );
    }
 
    public function addDoctor(Environment $twig,
        FormFactoryInterface $factory,
        Request $request,
        //ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator
        )
    {
        $doctor = new Doctors();
     
        $builder = $factory->createBuilder(FormType::class, $doctor);
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
                    'address', AddressType::class
//                     [
//                         'entry_type' => AddressType::class,
//                         'entry_options' => ['label' => false]
//                     ]
                    )
                    //end address
        
                ->add(
                    'submit', SubmitType::class,
                    ['attr' => [
                        'class' => 'btn btn-success btn-block',
                        'stateless' => false
                    ],
                        'label' => 'FORM.ADDRESSBOOK.SUBMIT'
                    ]
                    );
        
        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        { 
            $manager->persist($doctor);
            $manager->flush();
            
            $session->getFlashBag()->add('info', 'Ok, New contact is registered!');
            
            return new RedirectResponse
            (
                $urlGenerator->generate('addressbook_list')
                );
        }
                    
        return new Response
        (
             $twig->render(
                    'Modules/Addressbook/addressbookAdd.html.twig',
                    [ 'doctorFormular' => $form->createView()]
                    )
         );
                    
    }
}