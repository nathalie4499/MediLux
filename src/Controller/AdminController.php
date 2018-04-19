<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\User;
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
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AdminController extends Controller
{
    public function adminMain(Environment $twig)
    {
        return new Response(
            $twig->render(
                'Modules/Admin/adminMain.html.twig', [
                    'controller_name' => 'PatientController',
                ])
            );
    }

    public function adminUser(Environment $twig, FormFactoryInterface $factory, Request $request, ObjectManager $manager,
        SessionInterface $session, UrlGeneratorInterface $urlGenerator,  EncoderFactoryInterface $encoderFactory)
    {
        
        
        
        
        
        $user = new User();
        $builder = $factory->createBuilder(FormType::class, $user);
        $builder->add(
            'username',
            TextType::class,
            [
                'required' => true,
                'label' => 'FORM.USER.USERNAME',
                'attr' => [
                    'placeholder' => 'FORM.USER.PLACEHOLDER.USERNAME',
                    'class' => 'addusername'
                ]
            ]
            )
            
            ->add(
                'firstname',
                TextareaType::class,
                [
                    'required' => false,
                    'label' => 'FORM.USER.FIRSTNAME',
                    'attr' => [
                        'placeholder' => 'FORM.USER.PLACEHOLDER.FIRSTNAME',
                        'class' => 'addfirstname'
                    ]
                    
                ]
                )

            ->add(
                'lastname',
                TextareaType::class,
                [
                    'required' => false,
                    'label' => 'FORM.USER.LASTNAME',
                    'attr' => [
                        'placeholder' => 'FORM.USER.PLACEHOLDER.LASTNAME',
                        'class' => 'addlastname'
                    ]
                    
                ]
                )
            ->add(
                'password',
                PasswordType::class,
                [
                    'required' => true,
                    'label' => 'FORM.USER.PASSWORD',
                    'attr' => [
                        'placeholder' => 'FORM.USER.PLACEHOLDER.PASSWORD',
                        'class' => 'addpassword'
                    ]
                    
                ]
                )
        
            ->add('submit', SubmitType::class);
            
            $form = $builder->getForm();
            $form->handleRequest($request);
            
            if($form->isSubmitted() && $form->isValid())
            {
                $salt = md5($user->getUsername());
                $user->setSalt($salt);
                
                $encoder = $encoderFactory->getEncoder(User::class);
                $password = $encoder->encodePassword(
                    $user->getPassword(),
                    $salt
                    );
                
                $user->setPassword($password);
                $manager->persist($user);
                $manager->flush();

            }
        
 

            
            
     //   $builder = $factory->createBuilder(FormType::class);
        
    //    $builder->add('submit', SubmitType::class)
    //            ->add('username', HiddenType::class);

        
    //    $formuserdel = $builder->getForm();
    //    $formuserdel->handleRequest($request);
    //   if($formuserdel->isSubmitted())
    //    {
   //         $manager->remove($user);
    //        $manager->flush();
   //     }
        
        
        $repository = $this->getDoctrine()
        ->getRepository(User::class);
        $users = $repository->findAll();
        return new Response(
            $twig->render(
                'Modules/Admin/adminUser.html.twig',
                [
                    'users' => $users,
                    'formular_add_user'=>  $form->createView(),
                    'isTrue'=> true
                    
                ]
                
                
                )
            );
    }

    
    /**
     * @Route("/user/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        
        $deluser = $this->getDoctrine()->getRepository(User::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($deluser);
        $entityManager->flush();
        
    }
}