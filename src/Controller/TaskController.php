<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Entity\UserDataSQL;
use App\Entity\UsersTasks;
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
        $dueDateIsRequired = false;
        $dueDateIsDisabled = false;

        $form = $this->createForm(TaskType::class, $task , [
            'require_due_date' => $dueDateIsRequired,
            'disable_due_date' => $dueDateIsDisabled
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
                //assigning current task data to the user's data
                $userDataChangedTask->setTask($task->getTask());
                $userDataChangedTask->setDueDate($task->getDueDate());
                $entityManager->flush();

                //assigning particular task to the database related specifically to the tasks
                $newTask =  new UsersTasks();
                $newTask ->setTask($task->getTask());
                $newTask ->setDueDate($task->getDueDate());
                $newTask -> setUserId($userDataChangedTask->getId());
                $entityManager->persist($newTask);
                $entityManager->flush();

                //return $this->redirectToRoute('task_success');
                return $this->redirectToRoute('user_data_panel', ['email' => $email, 'password' => $password]);              //redirect to the route related to user's control panel
            }
            else{
                return new Response(
                    '<html><body>User doesnt exist</body></html>'               //in case of incorrect input, give a proper output
                );
            }
        }
        else{
            $form = $this->createForm(TaskType::class, $task, [
                'require_due_date' => $dueDateIsRequired,
                'disable_due_date' => $dueDateIsDisabled
            ]);
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

    #[Route('user_data_sql/delete_task/{email}/{password}', name: 'user_data_delete_task')]
    public function deleteTaskByEmail(string $email, string $password, Request $request, EntityManagerInterface $entityManager): Response
    {
        // creates a task object
        $task = new Task();

        // use some PHP logic to decide if this form field is required or not
        $dueDateIsRequired = false;
        $dueDateIsDisabled = true;

        $form = $this->createForm(TaskType::class, $task , [
            'require_due_date' => $dueDateIsRequired,
            'disable_due_date' => $dueDateIsDisabled
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
                $lol = $task->getTask();
                $lol2 = $userDataChangedTask->getId();
                //finding a task that is to be deleted on the basis of its content and user id
                $taskToBeDeleted = $entityManager->getRepository(UsersTasks::class)->findOneBy(
                    ['task' => $task->getTask(),
                        'user_id' => $userDataChangedTask->getId()]);
                if(!$taskToBeDeleted)
                {
                    return new Response(
                        '<html><body>No such task for this user was found</body></html>'
                    );
                }
                else {
                    $entityManager->remove($taskToBeDeleted);
                    $entityManager->flush();

//                    return new Response(
//                        '<html><body>Task was successfully removed</body></html>'
//                    );
                    return $this->redirectToRoute('user_data_panel', ['email' => $email, 'password' => $password]);              //redirect to the route related to user's control panel
                }
            }
            else{
                return new Response(
                    '<html><body>User doesnt exist</body></html>'               //in case of incorrect input, give a proper output
                );
            }
        }
        else{
            $form = $this->createForm(TaskType::class, $task, [
                'require_due_date' => $dueDateIsRequired,
                'disable_due_date' => $dueDateIsDisabled
            ]);
        }

        return $this->render('user_data_sql/form.html.twig', [
            'form' => $form,
            'signup' => 0
        ]);

    }


}

?>