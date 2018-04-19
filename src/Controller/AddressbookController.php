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
        ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator
        )
    {
        $doctor = new Doctors();
     
        $addressDoctor = new AddressDoctors();
        
        $builder = $factory->createBuilder(FormType::class, $addressDoctor);
        $builder->add(
            'zip', TextType::class,
            ['label' => 'FORM.ADDRESSBOOK.ZIP']
            )
            ->add(
                'submit', SubmitType::class,
                ['attr' => ['class' => 'btn btn-success btn-block'],
                    'label' => 'FORM.ADDRESSBOOK.SUBMIT'
                ]
                );
        
        $form = $this->createForm(AddressType::class, $doctor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        { 
            $manager->persist($addressDoctor);
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