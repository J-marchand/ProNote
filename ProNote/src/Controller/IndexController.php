<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {

        $student = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findAll();

        return $this->render('index/index.html.twig', [
            'student' => $student
        ]);
    }
}
