<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use App\Repository\PatientAddressRepository;
use App\Entity\PatientAddress;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PatientAddressController extends Controller
{
    public function addPatientAddress(
        Environment $twig,
        FormFactoryInterface $factory,
        Request $request,
        ObjectManager $manager,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator,
        EncoderFactoryInterface $encoderFactory,
        PatientAddressRepository $patientAddressRepository        
        )
    {
        $patientAddress = new PatientAddress();
        
        $builder = $factory->createBuilder(FormType::class, $patientAddress);
        
        $builder->add(
            'streetnumber',
            StringType::class,
            [
                'label' => 'FORM.PATIENTADDRESS.STREETNUMBER',
                'attr' => [
                    'placeholder' => 'FORM.PATIENTADDRESS.STREETNUMBER',
                    'class' => 'form-control'
                ]
            ]
            )
            ->add(
            '',
            StringType::class,
            [
                'label' => 'FORM.PATIENTADDRESS.STREET',
                'attr' => [
                    'placeholder' => 'FORM.PATIENTADDRESS.STREET',
                    'class' => 'form-control'
                ]
            ]               
             )
            ->add(
             'locality',
                StringType::class,
                [
                'label' => 'FORM.PATIENTADDRESS.LOCALITY',
                'attr' => [
                    'placeholder' => 'FORM.PATIENTADDRESS.LOCALITY',
                    'class' => 'form-control'
                ]
            ]
            )
            ->add(
            'municipality',
            StringType::class,
            [
                'label' => 'FORM.PATIENTADDRESS.MUNICIPALITY',
                'attr' => [
                    'placeholder' => 'FORM.PATIENTADDRESS.MUNICIPALITY',
                    'class' => 'form-control'
                ]
            ]
            )
            ->add(
            'canton',
            StringType::class,
            [
                'label' => 'FORM.PATIENTADDRESS.CANTON',
                'attr' => [
                    'placeholder' => 'FORM.PATIENTADDRESS.CANTON',
                    'class' => 'form-control'
                ]
            ]
            )
            ->add(
            'zips',
                StringType::class,
                [
                    'label' => 'FORM.PATIENTADDRESS.ZIP',
                    'attr' => [
                        'placeholder' => 'FORM.PATIENTADDRESS.ZIP',
                        'clas' => 'form-control'
                    ]
                ]
                )
                ->add('submit', SubmitType::class);
        
        $form = $builder->getForm();
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
                              
            $manager->persist($user);
            $manager->flush();
        }
            
            $repository = $this->getDoctrine()
            ->getRepository(PatientAddress::class);
            $users = $repository->findAll();
            return new Response(
                $twig->render(
                    'Modules/Admin/adminUser.html.twig',
                    [
                        'patientaddress' => $patientAddress,
                        'formular_patient_address'=>  $form->createView(),
                        'isTrue'=> true
                        
                    ]
                    
                    
                    )
                );
            
            
            
        }

}















?>