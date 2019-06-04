<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Teacher;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher", name="teacher")
     */
    public function index()
    {
        $teacher = $this->getDoctrine()
            ->getRepository(Teacher::class)
            ->findAll();

        return $this->render('teacher/index.html.twig', [
            'teacher' => $teacher
        ]);
    }

    /**
     * @Route("/teacher/detail/{id}", name="teacherDetail")
     */
    public function teacherDetail($id)
    {
        $teacher = $this->getDoctrine()
        ->getRepository(Teacher::class)
        ->findOneBy(['id' => $id]);

        return $this->render('teacher/teacherDetail.html.twig', [
            'teacher' => $teacher
        ]);
    }
}
