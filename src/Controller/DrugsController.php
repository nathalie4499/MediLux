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
use App\Repository\DrugsRepository;
use App\Entity\Drugs;


class DrugsController extends Controller
{
    public function drugsList(Environment $twig, DrugsRepository $repository)
    {
        return new Response(
            $twig->render(
                'Modules/Drugs/drugsList.html.twig', [
                    'drugs' => $repository->findAll(),
                ])
            );
    }
    /** @Route("/drugs/get/{drugid}", name="drugget")*/
    public function getDrugs( )
    {
        $searchTerm = $request->query->get('search');
        
        $em = $this->getDoctrine()->getManager();
        $search = $em->getRepository('AppBundle:Classified')->searchClassifieds($searchTerm);
        
        $results = $query->getResult();
        
        $content = $this->renderView('search-result.html.twig', [
            'results' => $results
        ]);
        
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }
    public function drugsAdd(Environment $twig,
        FormFactoryInterface $factory,
        Request $request,
        SessionInterface $session,
        UrlGeneratorInterface $urlGenerator,
        ObjectManager $manager)
    {
        $drug = new Drugs();
        
        $builder = $factory->createBuilder(FormType::class, $drug);
        $builder->add(
            'name', TextType::class,
            ['label' => 'FORM.DRUGS.NAME']
            )
            ->add(
                'supplier', TextType::class,
                ['required' => false,
                    'label' => 'FORM.DRUGS.SUPPLIER',
                ]
                )
                ->add(
                    'dosage', TextType::class,
                    ['label' => 'FORM.DRUGS.DOSAGE']
                    )
                    ->add(
                        'contraindications', TextType::class,
                        ['label' => 'FORM.DRUGS.CONTRAINDICATIONS']
                        )
                        ->add(
                            'sideeffects', TextType::class,
                            ['required' => false,
                                'label' => 'FORM.DRUGS.SIDEEFFECTS',
                            ]
                            )
                            ->add(
                                'incompatibilities', TextType::class,
                                ['label' => 'FORM.DRUGS.INCOMPATIBILITIES']
                                )
                                ->add(
                                    'overdose', TextType::class,
                                    ['label' => 'FORM.DRUGS.OVERDOSE']
                                    )
                                    ->add(
                                        'components', TextType::class,
                                        ['required' => false,
                                            'label' => 'FORM.DRUGS.COMPONENTS',
                                        ]
                                        )
            //end address
        ->add(
            'submit', SubmitType::class,
            ['attr' => [
                'class' => 'btn btn-success btn-block',
                'stateless' => false
            ],
                'label' => 'FORM.ADDRESSBOOK.SUBMIT'
            ]
            );
        
        $form = $builder->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
//             var_dump($drug);
            $manager->persist($drug);
//             var_dump($drug);
            $manager->flush();
            
//             $session->getFlashBag()->add('info', 'Ok, New contact is registered!');
//             return new RedirectResponse
//             (
//                 $urlGenerator->generate('drugs_list')
//                 );
        }
        return new Response(
            $twig->render(
                'Modules/Drugs/drugsAdd.html.twig', [
                    'drugsFormular' => $form->createView(),
                ])
            );
    }

    /**
     * @param Request  $request
     * @param Drugs $drugid
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/drugs/delete/{drugid}", name="drugdelete")
     */
    
    public function deleteAction(Request $request, Drugs $drugid)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        if ($drugid === null) {
            return $this->redirectToRoute('drugs_list');
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($drugid);
        $em->flush();
        return $this->redirectToRoute('drugs_list');
    }

}
