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


class AddressbookController extends Controller
{
    public function addressbookList(
                                     Environment $twig,
                                     DoctorsRepository $repository
                                    )
    {
        return new Response(
            $twig->render(
                'Modules/Addressbook/addressbookList.html.twig', 
                [
                    'doctor' => $repository->findAll(),
                ]
                )
            );
    }
    
    public function addressbookDetail(
                                       Environment $twig,
                                       int $doctor
                                        )
    {
        $doctor = $repository->find($doctor);
        if (!$doctor) {
            throw new NotFoundHttpException();
        }

        return new Response
                   (
                       $twig->render
                              (
                                'Modules/Addressbook/addressbookDetail.html.twig',
                                [
                                    'doctor' => $doctor,
                                    'routeAttr' => ['doctor' => $doctor->getId()],
                                    'form' => $form->createView()
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
        $builder = $factory->createBuilder(FormType::class, $doctor);
        $builder->add(
                      'firstname', TextType::class,
                         ['label' => 'FORM.ADDRESSBOOK.FIRSTNAME']
                     )
                ->add(
                      'lastname', TextType::class,
                         ['required' => false,
                          'label' => 'FORM.ADDRESSBOOK.LASTNAME',
                         ]
                     )
                ->add(
                      'specialization', TextType::class,
                      ['label' => 'FORM.ADDRESSBOOK.SPECIALIZATION']
                     )
                ->add(
                      'telwork', TextType::class,
                      ['label' => 'FORM.ADDRESSBOOK.TELWORK']
                      )
                ->add(
                      'telpriv', TextType::class,
                      ['required' => false,
                          'label' => 'FORM.ADDRESSBOOK.TELPRIV',
                      ]
                      )
                ->add(
                      'mobile', TextType::class,
                      ['label' => 'FORM.ADDRESSBOOK.MOBILE']
                      )
                ->add(
                      'email', TextType::class,
                      ['label' => 'FORM.ADDRESSBOOK.EMAIL']
                      )
                ->add(
                      'fax', TextType::class,
                      ['required' => false,
                         'label' => 'FORM.ADDRESSBOOK.FAX',
                      ]
                      )
                ->add(
                      'language', TextType::class,
                      ['label' => 'FORM.ADDRESSBOOK.LANGUAGE']
                      )
                ->add(
                      'title', TextType::class,
                      ['label' => 'FORM.ADDRESSBOOK.TITLE']
                      )
//                 ->add(
//                       'address', TextType::class,
//                       ['required' => false,
//                          'label' => 'FORM.ADDRESSBOOK.ADDRESS',
//                       ]
//                       )
                         
                ->add(
                      'submit', SubmitType::class,
                        ['attr' => ['class' => 'btn btn-success btn-block'],
                            'label' => 'FORM.ADDRESSBOOK.SUBMIT'
                        ]
                      );
                    
                    $form = $builder->getForm();
                    
                    
                    $form->handleRequest($request);
                    if ($form->isSubmitted() && $form->isValid())
                    {
                        $manager->persist($doctor);
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
                            ['formular' => $form->createView()]
                            )
                        );
                    
    }
}