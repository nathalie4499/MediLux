<?php

namespace App\Controller;

use App\Entity\Doctors;
use App\Form\Type\AddressType;
use App\Repository\AddressDoctorsRepository;
use App\Repository\DoctorsRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;


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
 
    public function searchDoctor
                    (
                        DoctorsRepository $repository,
                        Request $request
                     )
    {
        //get data from jquery assign to $specialization
        $specialization = $request->request->get('specialization');
        
        
        $unavailable = false;
        if (!empty($specialization))
        {
        $unavailable = $repository->specializationExists($specialization);
        }
//         return new JsonResponse(
//             ['available' => !$unavailable]
//             );

//         return new Response(
//             $twig->render(
//                 'Modules/Addressbook/addressbookList.html.twig',
//                 [
//                     'specialization' => $repository->findAll()
//                 ]
//                 )
//             );

    }
    
    public function addDoctor(
                                Environment $twig,
                                FormFactoryInterface $factory,
                                Request $request,
                                SessionInterface $session,
                                UrlGeneratorInterface $urlGenerator,
                                ObjectManager $manager
                               
                              
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
            var_dump($doctor);
            $manager->persist($doctor);
            var_dump($doctor);
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