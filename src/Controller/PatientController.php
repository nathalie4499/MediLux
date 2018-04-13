<?php

namespace App\Controller;

use App\Entity\Patient;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
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
     * @Route("/patient", name="Patient")
     */
    
    public function patientRecord(
        Environment $twig,     
        FormFactoryInterface $factory,
        Request $request,
        ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator)
    {
        $patient = new Patient();
        $builder = $factory->createBuilder(FormType::class, $patient);
        $builder->add(           
                'ssn',            
                IntegerType::class,           
                [               
                'attr' => [
                    'placeholder' => 'PATIENT_FORM.SSN'
                    ]               
                ]          
            )->add(
                'birthdate',
                BirthdayType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.DOB'
                    ]
                ]
            )->add(
                'birthplace',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.POB'
                    ]
                ]
            )->add(
                'gender',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.GENDER'
                    ]
                ]
            )->add(
                'birthname',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.BIRTHNAME'
                    ]
                ]
            )->add(
                'givenname',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.GIVENNAME'
                    ]
                ]
            )->add(
                'maritalname',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.MARITALNAME'
                    ]
                ]
            )->add(
                'title',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.TITLE'
                    ]
                ]
            )->add(
                'insurance',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.INSURANCE'
                    ]
                ]
            )->add(
                'complementaryinsurance',
                TextAreaType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.COMPLEMENTARYINSURANCE'
                    ]
                ]
            )->add(
                'maritalstatus',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.MARITALSTATUS'
                    ]
                ]
            )->add(
                'numberchildren',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.NUMBERCHILDREN'
                    ]
                ]
            )->add(
                'job',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.JOB'
                    ]
                ]
            )->add(
                'nationality',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.NATIONALITY'
                    ]
                ]
            )->add(
                'language',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.LANGUAGE'
                    ]
                ]
            )->add(
                'picture',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.PICTURE'
                    ]
                ]
            )->add(
                'notes1',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.NOTES1'
                    ]
                ]
            )->add(
                'notes2',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.NOTES2'
                    ]
                ]
            )->add(
                'record',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.RECORD'
                    ]
                ]
            )->add(
                'family',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.FAMILY'
                    ]
                ]
            )->add(
                'otherphysicians',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.OTHERPHYSICIANS'
                    ]
                ]
            )->add(
                'creationdate',
                DateType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.CREATIONDATE'
                    ]
                ]
            )->add(
                'modifieddate',
                DateType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.MODIFIEDDATE'
                    ]
                ]
            )->add(
                'modifiedby',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.MODIFIEDBY'
                    ]
                ]
            )->add(
                'treatingphysician',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.TREATINGPHYSICIAN'
                    ]
                ]
            )->add(
                'referringdoctorid',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.REFERRINGDOCTORID'
                    ]
                ]
            )->add(
                'risid',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.RISID'
                    ]
                ]
            )->add(
                'luxembourgid',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.LUXEMBOURGID'
                    ]
                ]
            )->add(
                'otherid',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.OTHERID'
                    ]
                ]
            )->add(
                'mediluxid',
                IntegerType::class,
                [
                    'attr' => [
                        'placeholder' => 'PATIENT_FORM.MEDILUXID'
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
     );
    
    }

}

