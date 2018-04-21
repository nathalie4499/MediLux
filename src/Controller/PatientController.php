<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\PatientAddress;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use App\Form\PatientForm;
use Doctrine\Common\Collections\Collection;



class PatientController extends Controller
{
    
    public function patientRecord(
        Environment $twig,     
        FormFactoryInterface $factory,
        Request $request,
        ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator)
    {
        $patient = new Patient();
        $patientaddress = new PatientAddress();
        
        $patient->getPatientaddresslist();

        
        $builder = $factory->createBuilder(PatientForm::class, $patient);
        /** ->add(
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
                'title',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.ACTIVEPROBLEMTITLE',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.ACTIVEPROBLEMS',
                        'class' => 'form-control'
                    ]
                ]
            ) **/ /**->add(
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
            )  ->add(
                'country',
                TextType::class,
                [
                    'label' => 'FORM.PATIENT.COUNTRY',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.COUNTRY',
                        'class' => 'form-control'
                    ]
                ]
            ) **/
                        
           /** ->add(
                'activeproblems',
                ActiveProblems::class
                )            
            ->add(
                'patientaddress',
                PatientAddress::class
                ) **/

                
            $form = $builder->getForm(PatientForm::class, $patient);
            $form->handleRequest($request);
            
            
            if($form->isSubmitted() && $form->isValid())
            {
                $form->get($patient)->getData();
                
                $manager->persist($patient);
                $manager->flush();
                
                $session->getFlashBag()->add('info', 'Patient record was created/updated');
                              
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

