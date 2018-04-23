<?php
namespace App\Manager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ActiveProblems;
use App\Entity\Patient;
use App\Form\ActiveProblemsForm;

class PatientManager
{
    private $formFactory;
    
    private $manager;
    
    private $tokenStorage;
    
    
    public function __construct(
        FormFactoryInterface $formFactory,
        ObjectManager $manager,
        TokenStorageInterface $tokenStorage
        ) {
            $this->formFactory = $formFactory;
            $this->manager = $manager;
            $this->tokenStorage = $tokenStorage;
    }
    
    public function processForm($activeproblems, Patient $patient)
    {
               
                $activeproblems = new ActiveProblems();
                
                $this->manager->persist($activeproblems);
                $this->manager->flush();
            }

    
    public function handleRequest(FormInterface $form, Request $request)
    {
        $form->handleRequest($request);
    }
    
    public function getBaseForm($activeproblems)
    {
        return $this->formFactory->create(
            ActiveProblemsForm::class,
            $activeproblems,
            ['stateless' => true]
            );
    }
}