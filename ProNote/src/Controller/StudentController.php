<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function student()
    {
        $student = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findAll();

        return $this->render('student/index.html.twig', [
            'student' => $student
        ]);
    }


    /**
     * @Route("/student/detail/{id}", name="studentDetail")
     */
    public function studentDetail($id)
    {

        $student = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findOneBy(['id' => $id]);

        return $this->render('student/studentDetail.html.twig', [
            'student' => $student
        ]);
    }
}
