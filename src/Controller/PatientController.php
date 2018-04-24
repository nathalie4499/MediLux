<?php

namespace App\Controller;

use App\Entity\ActiveProblems;
use App\Entity\Patient;
use App\Entity\PatientAddress;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\ActiveProblemsForm;
use App\Form\PatientAddressType;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormTypeInterface;
use App\Repository\PatientAddressRepository;
use App\Repository\ActiveProblemsRepository;



class PatientController extends Controller
{
    
    
    public function patientRecord(
        Environment $twig,     
        FormFactoryInterface $factory,
        Request $request,
        ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator,
        PatientRepository $patientRepository
        )
    {
        $patient = new Patient();
        //$patientaddress = new PatientAddress();
        
        //$patient->getPatientaddresslist();
        //$patient->getActiveproblemslist();

        
        $builder = $factory->createBuilder(FormType::class, $patient);
        $builder->add(
            'ssn',
            TextType::class,
            [
                'required' => true,
                'label' => 'SSN',
                'attr' => [
                    'placeholder' => 'MLPATIENT.SSN',
                    'class' => 'form-control'
                ]
            ]
            )->add(
            'age',
            TextType::class,
            [
                'label' => 'MLPATIENT.AGE',
                'attr' => [
                    'placeholder' => 'MLPATIENT.AGE',
                    'class' => 'form-control'
                ]
            ]
            )->add(
            'givenname',
            TextType::class,
            [
                'label' => 'MLPATIENT.GIVENNAME',
                'attr' => [
                    'placeholder' => 'MLPATIENT.GIVENNAME',
                    'class' => 'form-control'
                ]
            ]
            )->add(
            'birthname',
            TextType::class,
            [
                'required' => true,
                'label' => 'MLPATIENT.BIRTHNAME',
                'attr' => [
                    'placeholder' => 'MLPATIENT.BIRTHNAME',
                    'class' => 'form-control'
                ]
            ]
            )->add(
            'maritalname',
            TextType::class,
            [
                'label' => 'MLPATIENT.MARITALNAME',
                'attr' => [
                    'placeholder' => 'MLPATIENT.MARITALNAME',
                    'class' => 'form-control'
                ]
            ]
            )->add(
            'nationality',
            TextType::class,
            [
                'label' => 'MLPATIENT.NATIONALITY',
                'attr' => [
                    'placeholder' => 'MLPATIENT.NATIONALITY',
                    'class' => 'form-control'
                ]
            ]
            )->add(
            'language',
            TextType::class,
            [
                'label' => 'MLPATIENT.LANGUAGE',
                'attr' => [
                    'placeholder' => 'MLPATIENT.LANGUAGE',
                    'class' => 'form-control'
                ]
            ]
            )    
                
           /**  $builder->add(
                'patientaddresslist', CollectionType::class, array
                (
                    'entry_type' => PatientAddressType::class,
                    'entry_options' => array('label' => false),
                    
                ));
            
            $builder->add(
                'activeproblemslist', CollectionType::class, array
                (
                    'entry_type' => ActiveProblemsForm::class,
                    'entry_options' => array('label' => false),
                    
                ));**/

                ->add(
                'submit',
                SubmitType::class,
                [
                    'attr' => [
                        
                        'class' => 'btn-lbock btn-success'
                    ]
                ]
          );
         
            $form = $builder->getForm();
            $form->handleRequest($request);
            
            if($form->isSubmitted())
            {
               // $form->get($patient)->getData();
                $manager->persist($patient);
                $manager->flush();
                               
                $session->getFlashBag()->add('info', 'Patient record was created/updated');
                
                return new RedirectResponse
                (
                    $urlGenerator->generate('patient_record')
                    );

                              
            }
            return new Response(
                $twig->render(
                    'Modules/Patient/patient.html.twig',
                    [
                        'patientCreationFormular'=>  $form->createView(),
                        'patients' => $patientRepository->findAll()
                    ]
                    )
                ); 
            //$repository = $this->getDoctrine()
            
          //  ->getRepository(Patient::class);
            
           // $ssns = $repository->findAll();
 
    }
    
//     public function findPatient(Environment $twig, PatientRepository $repository)
//     {
//         return new Response(
//             $twig->render(
//                 'Modules/Patient/Patient.html.twig',
//                 [
//                     'Patient' => $repository->findOneBySsn($ssn)
//                 ]
//                 )
//             );
//     }
    
    /** public function updatePatient(
        ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator,
        PatientRepository $patientRepository
        ) {
            $patientRepository = $manager->getRepository(Patient::class);
            $patient = $patientRepository->findOneBySsn($ssn);
            
            if(patient) {
                $patient->setMaritalname();
                $patient->setNationality();
                $patient->setLanguage();
                $patient->setAge();
                $patient->setTelephone();
                $patient->setActiveproblemslist();
                $patient->setPatientaddress();
                
                $manager->flush();
                
                $session->getFlashBag()->add('info', 'Patient updated');
                
                return new Response(
                    $twig->render(
                        'Modules/Patient/patient.html.twig',
                        [
                            'patientCreationFormular'=>  $form->getView()
                        ]
                        )
                    ); 
            }
        } **/
 /**   public function displayPatient(
        Environment $twig,
        PatientRepository $patientRepository,
        int $patient,
        PatientManager $patientmanager,
        UrlGeneratorInterface $urlGenerator,
        Request $request
        ) {
            $patient = $patientRepository->find($patient);
            //$patientaddress = $patientaddressRepository->find($patientaddress);
            //$activeproblems = $activeproblemsRepository->find($activeproblems);
            
            if (!$patient) {
                throw new NotFoundHttpException();
            }
            
            $activeproblems = new ActiveProblems();
            $form = $patientmanager->getBaseForm($activeproblems);
            $patientmanager->handleRequest($form, $request);
            
            if ($form->isSubmitted() && $form->isValid()) {
                $patientmanager->processform($activeproblems, $patient);
            }
            
            return new RedirectResponse($urlGenerator->generate('patient', ['patient' => $patient->getId()]));
            /** return new Response(
                $twig->render(
                    'Modules/Patient/patient.html.twig',
                    [
                        'patient' => $patientRepository->find($patientaddress),
                        'patientaddress' => $patientaddressRepository->find($patientaddress),
                        'activeproblems' => $activeproblemsRepository->find($activeproblems)
                    ]
                    )
                ); **/

            /** return new Response(
                $twig->render(
                    'Modules/Patient/patient.html.twig',
                    [
                        'patient' => $patient,
                        'routeAttr' => ['patient_record' => $patient->getId()],
                        'form' => $form->createView()
                    ]
                    )
                ); **/
            
     /**       return new Response(                
                $twig->render(                    
                    'Modules/Patient/patient.html.twig',                    
                    [                        
                        'patientCreationFormular'=>  $form->createView()
                        
                    ]                   
                    )
                );
    } **/
            
 }
