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
use App\Entity\Role;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Acl;
use Doctrine\DBAL\Types\ArrayType;
use App\Repository\RoleRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;




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
        SessionInterface $session, UrlGeneratorInterface $urlGenerator,  EncoderFactoryInterface $encoderFactory,
        RoleRepository $roleRepository)
    {
        $user = new User();

        $builder = $factory->createBuilder(FormType::class, $user);
        $builder->add(
            'username',
            TextareaType::class,
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

            ->add('roleToAdd', EntityType::class, [
                'label' => 'FORM.USER.ROLETOADD',
                'class'        => Role::class,
                'choice_label' => 'label',
                'mapped'       => false,
            ])


//            ->add('aclToAdd', EntityType::class, [
//                'label' => 'FORM.USER.ACLTOADD',
//                'class'        => ACL::class,
//               'choice_label' => false,
//                'mapped'       => false,
//                'expanded'     => true,
//               'multiple'     => true,
//            ])
            

            

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
                
                $role = $form->get('roleToAdd')->getData();

                $user->setRole($role);

                
                
                $manager->persist($user);
                $manager->flush();

            }

        $repository = $this->getDoctrine()
        ->getRepository(Acl::class);
        $acl = $repository->findAll();
            
        $repository = $this->getDoctrine()
        ->getRepository(Role::class);
        $role = $repository->findAll();
        
        $repository = $this->getDoctrine()
        ->getRepository(User::class);
        $users = $repository->findAll();
        return new Response(
            $twig->render(
                'Modules/Admin/adminUser.html.twig',
                [
                    'users' => $users,
                    'role' => $role,
                    'acl' => $acl,
                    'formular_add_user'=>  $form->createView(),
                    'isTrue'=> true
                    
                ]
                
                
                )
            );
        
     
        
    }

    
    
    /**
     * @param Request  $request
     * @param User $userid
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/user/delete/{userid}", name="userdelete")
     */

    public function deleteAction(Request $request, User $userid)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        if ($userid === null) {
            return $this->redirectToRoute('admin_user');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($userid);
        $em->flush();
        return $this->redirectToRoute('admin_user');
    }
    

    /**
     * @param Request  $request
     * @param User $userid
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user/edit/{userid}", name="useredit")
     */
    public function editUser(Request $request, User $userid, FormFactoryInterface $factory, ObjectManager $manager,  UrlGeneratorInterface $urlGenerator )
    {
    
        $editUserId = $userid->getID();
        
        $this->get('form.factory')->createNamed($editUserId);
 
        
       
        $builder = $factory->createBuilder(FormType::class, $userid);
        $builder->add(
            'username',
            TextType::class,
            [
                'required' => true,
                'label' => 'FORM.USER.USERNAME',
                'attr' => [
                    'placeholder' => 'FORM.USER.PLACEHOLDER.USERNAME',
                    'class' => 'modifyuser'
                    
                ]
            ]
            )
            
            
            
            ->add(
                'firstname',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'FORM.USER.FIRSTNAME',
                    'attr' => [
                        'placeholder' => 'FORM.USER.PLACEHOLDER.FIRSTNAME',
                        'class' => 'modifyuser'
                    ]
                ]
                )
            
                
            ->add(
                'lastname',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'FORM.USER.LASTNAME',
                    'attr' => [
                        'placeholder' => 'FORM.USER.PLACEHOLDER.LASTNAME',
                        'class' => 'modifyuser'
                    ]
                ]
                )

            ->add('roleToModify',
                EntityType::class,
                [
                'class'        => Role::class,
                'choice_label' => 'label',
                'mapped'       => false,
            ])
                
            ->add('save', SubmitType::class, array('label' => 'Modify the user'));
            
        $formedituser = $builder->getForm();
        $formedituser->handleRequest($request);
            
        

        
        if ($formedituser->isSubmitted() && $formedituser->isValid()) {
            
            $role = $formedituser->get('roleToModify')->getData();
            
            $userid->setRole($role);
            
            $manager->persist($userid);
            $manager->flush();
            return new RedirectResponse($urlGenerator->generate('admin_user'));
        }
        
        return $this->render('Modules/User/userEdit.html.twig', [
            'useredit' => $formedituser->createView(),
            'routeAttr' => ['userid' => $userid ->getId()
            ],
            'currentuser' => $userid ->getId()
        ]);
    }
    

    
}