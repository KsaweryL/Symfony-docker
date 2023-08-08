<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Entity\UserDataSQL;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class TaskController extends AbstractController
{
    #[Route('user_data_sql/task/{email}/{password}', name: 'user_data_task')]
    public function taskByEmail(string $email, string $password, Request $request, EntityManagerInterface $entityManager): Response
    {
        // creates a task object
        $task = new Task();

        // use some PHP logic to decide if this form field is required or not
        $dueDateIsRequired = true;

        $form = $this->createForm(TaskType::class, $task , [
            'require_due_date' => $dueDateIsRequired,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $form = $form->getData();

            //search for the user when given email and password
            $userDataChangedTask = $entityManager->getRepository(UserDataSQL::class)->findOneBy(
                ['email' => $email,
                    'password' => $password]);

            if($userDataChangedTask) {
                //assigning task data to the user's data
                $userDataChangedTask->setTask($task->getTask());
                $userDataChangedTask->setDueDate($task->getDueDate());
                $entityManager->flush();

                //assigning particular task to the database related specifically to the tasks
                //....to do

                return $this->redirectToRoute('task_success');
            }
            else{
                return new Response(
                    '<html><body>User doesnt exist</body></html>'               //in case of incorrect input, give a proper output
                );
            }
        }
        else{
            $form = $this->createForm(TaskType::class, $task);
        }

            return $this->render('user_data_sql/form.html.twig', [
                'form' => $form,
                'signup' => 0
            ]);

    }

    #[Route('/task_success', name: 'task_success')]
    public function success(): Response
    {
        return new Response(
            '<html><body>Task was successfully updated</body></html>'
        );


    }


}

?>