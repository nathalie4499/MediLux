<?php

namespace App\Controller;

use App\Entity\Doctors;
use App\Form\Type\AddressType;
use App\Repository\AddressDoctorsRepository;
use App\Repository\DoctorsRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use App\Entity\AddressDoctors;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\Type\DoctorType;
use App\Entity\Zip;
use App\Entity\Country;


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
        $form = $factory->create
                          (
                              DoctorType::class,
                              $doctor,
                              ['stateless' => true]
                           );
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        { 
           
            //$addressDoctor = new  AddressDoctors();
            
            
            $manager->persist($doctor);

            $manager->flush();
 
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