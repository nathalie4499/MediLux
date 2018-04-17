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


class AddressbookController extends Controller
{
    public function addressbookList(Environment $twig)
    {
        return new Response(
            $twig->render(
                'Modules/Addressbook/addressbookList.html.twig', [
                    'controller_name' => 'PatientController',
                ])
            );
    }
    
    public function addressbookDetail(Environment $twig)
    {
        return new Response(
            $twig->render(
                'Modules/Addressbook/addressbookDetail.html.twig', [
                    'controller_name' => 'PatientController',
                ])
            );
    }
}