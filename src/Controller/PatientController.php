<?php

namespace App\Controller;

use App\Entity\ActiveProblems;
use App\Entity\Patient;
use App\Entity\PatientAddress;
use App\Repository\ActiveProblemsRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
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
use Symfony\Component\Routing\Annotation\Route;


class PatientController extends Controller
{
    /**
     * @Route("/patient/record", name="patient_record")
     */
    
    public function patientRecord(
        Environment $twig,     
        FormFactoryInterface $factory,
        Request $request,

        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator)
    {
        $patient = new Patient();
        $builder = $factory->createBuilder(FormType::class, $patient);
        $builder->add(           
                'ssn',            
                \Symfony\Component\Form\Extension\Core\Type\IntegerType::class,          
                [               
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.SSN',
                        'class' => 'form-control'
                        ]               
                ]          
            )->add(
                'age',
                BirthdayType::class,
                [
                    'label' => 'FORM.PATIENT.AGE'
                ]
            )->add(
                'givenname',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.GIVENNAME',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.GIVENNAME',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'birthname',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.BIRTHNAME',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.BIRTHNAME',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'maritalname',
               TextType::class,
                [
                    'label' => 'FORM.PATIENT.MARITALNAME',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.MARITALNAME',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'nationality',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.NATIONALITY',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.NATIONALITY',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'language',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.LANGUAGE',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.LANGUAGE',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'telephone',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.TELEPHONE',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.TELEPHONE',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'activeproblems',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.ACTIVEPROBLEMS',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.ACTIVEPROBLEMS',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'activeproblemtitle',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.ACTIVEPROBLEMTITLE',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.ACTIVEPROBLEMS',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'streetnumber',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.STREETNUMBER',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.STREETNUMBER',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'street',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.STREET',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.STREET',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'locality',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.LOCALITY',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.LOCALITY',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'country',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.COUNTRY',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.COUNTRY',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'title',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.TITLE',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.TITLE',
                        'class' => 'form-control'
                    ]
                ]
            )->add(
                'description',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.DESCRIPTION',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.DESCRIPTION',
                        'class' => 'form-control'
                    ]
                ]
            )
            
            /** ->add(
                'activeproblems',
                ActiveProblems::class
            ) **/ ->add(
        
                'submit',                    
                SubmitType::class,                   
                [                        
                    'attr' => [                           
                        'class' => 'btn-lbock btn-success'                            
                    ]                        
        ]);
                
            $form = $builder->getForm();
            $form->handleRequest($request);
            
            if($form->isSubmitted() && $form->isValid())
            {
                $manager->persist($patient);
                $manager->flush();
                              
            }
            return new Response(
                $twig->render(
                    'Modules/Patient/patient.html.twig',
                    [
                        'patientCreationFormular'=>  $form->createView()                       
                    ]
            )
        );  
    


    
    /** public function patientCreation(
        Environment $twig,
        FormFactoryInterface $factory,
        Request $request,
        
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator)
    {
        $patient = new Patient();
        $builder = $factory->createBuilder(FormType::class, $patient);
        $builder->add(
            'ssn',
            IntegerType::class,
            [
                'required' => true,
                'label' => 'SSN',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.SSN'
                ]
            ]
            )->add(
            'age',
            BirthdayType::class,
            [
                'label' => 'FORM.PATIENT.AGE'
            ]
            )->add(
            'givenname',
            BirthdayType::class,
            [
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.FIRSTNAME'
                ]
            ]
            )->add(
            'birthname',
            TextType::class,
            [
                'required' => true,
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.LASTNAME'
                ]
            ]
            )->add(
            'maritalname',
            IntegerType::class,
            [
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.MARITALNAME'
                ]
            ]
            )->add(
            'nationality',
            TextType::class,
            [
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.NATIONALITY'
                ]
            ]
            )->add(
            'language',
            TextType::class,
            [
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.LANGUAGE'
                ]
            ]
            )->add(
            'telephone',
            TextType::class,
            [
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.TELEPHONE'
                ]
            ]
            )->add(
            'activeproblems',
            IntegerType::class,
            [
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.ACTIVEPROBLEMS'
                ]
            ]
            )->add(
                
            'submit',           
            SubmitType::class,
            
            [                
                'attr' => [                   
                    'class' => 'btn-lbock btn-success'                   
                ]                                           
            ]);
        
        return new Response(
            $twig->render(
                'Modules/Patient/patient.html.twig', [
                    'controller_name' => 'PatientController',
                ])
            ); **/ 
        
                                            
    }
}

