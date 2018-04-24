<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Zip;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SelectPatientController extends Controller{
    public function editPatient(
        Request $request,
        Patient $patientid,
        FormFactoryInterface $factory,
        ObjectManager $manager
        )
    {
        
        $editPatientId = $patientid->getID();
        
        $this->get('form.factory')->createNamed($editPatientId);
        
        
        
        $builder = $factory->createBuilder(FormType::class, $patientid);
        $builder->add(
            'givenname',
            TextType::class,
            [
                'label_format' => 'edit.patient.%id%',
                'block_name' => 'edit_patient',
                'required' => true,
                'label' => 'FORM.PATIENT.GIVENNAME',
                'attr' => [
                    'placeholder' => 'FORM.PATIENT.PLACEHOLDER.GIVENNAME',
                    'class' => 'modifypatient'
                    
                ]
            ]
            )
            
            
            
            ->add(
                'birthname',
                TextType::class,
                [
                    'label_format' => 'edit.patient.%id%',
                    'block_name' => 'edit_patient',
                    'required' => true,
                    'label' => 'FORM.PATIENT.BIRTHNAME',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENT.PLACEHOLDER.BIRTHNAME',
                        'class' => 'modifypatient'
                    ]
                ]
                )
                
                
                ->add(
                    'maritalname',
                    TextType::class,
                    [
                        'label_format' => 'edit.patient.%id%',
                        'block_name' => 'edit_patient',
                        'required' => true,
                        'label' => 'FORM.PATIENT.MARITALNAME',
                        'attr' => [
                            'placeholder' => 'FORM.PATIENT.PLACEHOLDER.MARITALNAME',
                            'class' => 'modifypatient'
                        ]
                    ]
                    )
//                     ->add('zipToModify',
//                         EntityType::class,
//                         [
//                             'label_format' => 'edit.user.%id%',
//                             'block_name' => 'edit_user',
//                             'class'        => Zip::class,
//                             'choice_label' => 'label',
//                             'mapped'       => false,
//                         ])
                        ->add('id',
                            HiddenType::class
                            )
                            
                            
                            
                            ->add('submit', SubmitType::class, [
                                'label_format' => 'edit.patient.%id%',
                                'block_name' => 'edit_patient',
                            ]);
                            $formselectpatient = $builder->getForm();
                            $formselectpatient->handleRequest($request);
                            
                            
                            
                            if ($formselectpatient->isSubmitted() && $formselectpatient->isValid()) {
                                
                                $zip = $form->get('zipToModify')->getData();
                                
                                $patientid->setZip($zip);
                                
                                $manager->persist($patientid);
                                $manager->flush();
                            }
                            
                            return $this->render('Modules/Patient/selectPatient.html.twig', [
                                'selectpatient' => $formselectpatient->createView(),
                                'routeAttr' => ['patientid' => $patientid ->getId()
                                ]
                            ]);
    }
}