<?php
// src/Controller/UserDataController.php
namespace App\Controller;

use App\Entity\UserData;
use App\Form\Type\UserDataType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDataController extends AbstractController{

    #[Route('/user_data')]
    public function new(Request $request): Response
    {
        #die('Koniec');
        $userData = new UserData();

        $form = $this->createForm(UserDataType::class, $userData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $form = $form->getData();

            // ... perform some action, such as saving the task to the database

            //return $this->redirectToRoute('task_success');
                return $this->render('user/userData.html.twig', [
                    'userData' => $userData,
                ]);

        }
        else{
            $form = $this->createForm(UserDataType::class, $userData);
        }


        return $this->render('task/new.html.twig', [
            'form' => $form,
        ]);

    }

}