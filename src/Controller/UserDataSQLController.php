<?php

namespace App\Controller;

use App\Entity\UserDataSQL;
use App\Entity\WelcomePage;
use App\Entity\LoginPage;
use App\Form\Type\UserDataSQLType;
use App\Form\Type\LoginPageType;
use App\Form\Type\UserDataSQLUpdateType;
use App\Form\Type\WelcomePageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserDataSQLController extends AbstractController
{
    //function that appends 2 strings
    function append_string ($str1, $str2) {

        // Using Concatenation assignment
        // operator (.=)
        $str1 .=$str2;

        // Returning the result
        return $str1;
    }
    //main route, choose between login and sign up
    #[Route('/user_data_sql')]
    public function welcome(Request $request, EntityManagerInterface $entityManager): Response
    {
        //whenever this route is reached, the method checks if admin's account is created and if not, does so
        if (!$entityManager->getRepository(UserDataSQL::class)->findOneBy([
            'email' => 'admin@email.com',
            'password' => 'admin']))
        {
            $adminAccount = new UserDataSQL();
            $adminAccount
                ->setName("Admin")
                ->setPassword("admin")
                ->setSurname("Admin")
                ->setAge(32)
                ->setEmail("admin@email.com")
                ->setCheckbox(true);

            //admin's account is persisted and inputted into the database
            $entityManager->persist($adminAccount);
            $entityManager->flush();


        }
        $currentDirectory = $request->getPathInfo();
        $loginDirectory = $this->append_string($currentDirectory, "/login");
        $signupDirectory = $this->append_string($currentDirectory, "/add");
        return $this->render('user/button/btn.html.twig', [
            'url' => $loginDirectory,
            'text' => "Log in",
            'url2' => $signupDirectory,
            'text2' => "Sign up",
            'url3' => "",
            'text3' => "",
            'url4' => "",
            'text4' => "",
            'user' => ""
        ]);

    }


    //login route
    #[Route('/user_data_sql/login', name: 'user_data_login')]
    public function login(Request $request, EntityManagerInterface $entityManager): Response
    {
        $loginData = new LoginPage();

        $form = $this->createForm(LoginPageType::class, $loginData);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();

            //search for the user when given email and password
            $userToBeFound = $entityManager->getRepository(UserDataSQL::class)->findOneBy(
                ['email' => $form->getEmail(),
                    'password' => $form->getPassword()]);

            //continue only if user is found
            if($userToBeFound)
            {
                return $this->redirectToRoute('user_data_panel', ['email' => $form->getEmail(), 'password' => $form->getPassword()]);              //redirect to the route related to user's control panel
            }
            else{
                return new Response(
                    '<html><body>Either email or password is incorrect</body></html>'               //in case of incorrect input, give a proper output
                );
            }

        }

        return $this->render('user_data_sql/form.html.twig', [
            'form' => $form,
            'signup' => 0,
        ]);
    }


    #[Route('/user_data_sql/add')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userData = new UserDataSQL();

        //type is just related to form?
        $form = $this->createForm(UserDataSQLType::class, $userData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $form = $form->getData();

            // ... perform some action, such as saving the task to the database
            //checking if there already exists a user with identical email in the database
            if($entityManager->getRepository(UserDataSQL::class)->findOneBy(['email' => $form->getEmail()]))
            {
                return new Response(
                    '<html><body>There already exists a user with such email, please redefine it</body></html>'
                );
            }

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($form);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            //return $this->redirectToRoute('task_success');
            return $this->render('user/userData.html.twig', [
                'userData' => $userData,
            ]);

        }
        else{
            $form = $this->createForm(UserDataSQLType::class, $userData);
        }

        return $this->render('user_data_sql/form.html.twig', [
            'form' => $form,
            'signup' =>1,
            'password' => $userData->getPassword(),
            'name' => $userData->getName()
        ]);

    }


    //delete a particular user
    #[Route('/user_data_sql/delete/{email}/{password}', name: 'user_data_delete')]
    public function delete(string $email, string $password,Request $request, EntityManagerInterface $entityManager): Response
    {
        if($email == 'admin@email.com' && $password == 'admin') {
            $userData = new UserDataSQL();
            $form = $this->createForm(UserDataSQLType::class, $userData);
            $form->handleRequest($request);

            //detecting if the input is correct
            if ($form->isSubmitted() && $form->isValid()) {

                $form = $form->getData();
                $userToBeDeleted = $entityManager->getRepository(UserDataSQL::class)->findOneBy(
                    ['name' => $form->getName(),
                        'surname' => $form->getSurname(),
                        'age' => $form->getAge(),
                        'email' => $form->getEmail(),
                        'checkbox' => $form->isCheckbox()]);

                //checking is user exists
                if ($userToBeDeleted) {
                    //deleting a user
                    $entityManager->remove($userToBeDeleted);
                    $entityManager->flush();

                    return new Response(
                        '<html><body>' . $userToBeDeleted->getName() . ' was deleted</body></html>'
                    );
                } else {
                    return new Response(
                        '<html><body>User doesnt exist</body></html>'
                    );
                }

            } else {
                $form = $this->createForm(UserDataSQLType::class, $userData);
            }

            return $this->render('user_data_sql/form.html.twig', [
                'form' => $form,
                'signup' => 0
            ]);
        }
        else{
            return new Response(
                '<html><body>Permission denied</body></html>'
            );
        }
    }

    //displays all users
    #[Route('/user_data_sql/display/{email}/{password}', name: 'user_data_display')]
    public function display(string $email, string $password,EntityManagerInterface $entityManager): Response
    {
        if($email == 'admin@email.com' && $password == 'admin') {
            $userData = new UserDataSQL();
            $form = $this->createForm(UserDataSQLType::class, $userData);

            $form = $form->getData();
            $allUsers = $entityManager->getRepository(UserDataSQL::class)->findAll();

            //in case there were no user in the database
            if (!$allUsers) {
                return new Response(
                    '<html><body>There are no users in the database</body></html>'
                );
            } else {

                return $this->render('user/usersDisplay.html.twig', [
                    'allUsers' => $allUsers,
                ]);
            }
        }
        else{
            return new Response(
                '<html><body>Permission denied</body></html>'
            );
        }
    }

    //user/admin control panel
    #[Route('/user_data_sql/panel/{email}/{password}', name: 'user_data_panel')]
    public function panelByEmail(string $email, string $password, Request $request, EntityManagerInterface $entityManager): Response
    {
        //determining the user
        $user = $entityManager->getRepository(UserDataSQL::class)->findOneBy(['email' => $email, 'password' => $password]);
        if (!$user) {
            throw $this->createNotFoundException(
                'No user found'
            );
        }
        else {
            //displaying the buttons as well as info
            $currentDirectory = $request->getPathInfo();
            $userUpdateUrl = str_replace('panel', 'update', $currentDirectory);
            $userUpdateUrlTask = str_replace('panel', 'task', $currentDirectory);
            //due to its unusual structure, it needs to be passed separately
            if($user->getDueDate()) $userDueDate = $user->getDueDate();
            else $userDueDate = "none";

            if ($email == 'admin@email.com' && $password == 'admin') {
                $userUpdateUrlDisplay = str_replace('panel', 'display', $currentDirectory);
                $userUpdateUrlDelete = str_replace('panel', 'delete', $currentDirectory);
                return $this->render('user/button/btn.html.twig', [
                    'url' => $userUpdateUrl,
                    'text' => "Update info",
                    'url2' => $userUpdateUrlTask,
                    'text2' => "Add a task",
                    'url3' => $userUpdateUrlDisplay,
                    'text3' => "Display users",
                    'url4' => $userUpdateUrlDelete,
                    'text4' => "Delete a user",
                    'user' => $user,
                    'userDueDate' => $userDueDate
                ]);
            } else {
                return $this->render('user/button/btn.html.twig', [
                    'url' => $userUpdateUrl,
                    'text' => "Update info",
                    'url2' => $userUpdateUrlTask,
                    'text2' => "Add a task",
                    'url3' => "",
                    'text3' => "",
                    'url4' => "",
                    'text4' => "",
                    'user' => $user,
                    'userDueDate' => $userDueDate
                ]);
            }
        }

    }

    //updating info on particular user
    //add some logic later to hide email and password
    #[Route('/user_data_sql/update/{email}/{password}', name: 'user_data_update')]
    public function updateByEmail(string $email, string $password, Request $request, EntityManagerInterface $entityManager): Response
    {
        $userData = $entityManager->getRepository(UserDataSQL::class)->findOneBy(['email' => $email, 'password' => $password]);
        if (!$userData) {
            throw $this->createNotFoundException(
                'No user found'
            );
        }
        else{
            $userDataUpdated = new UserDataSQL();
            $form = $this->createForm(UserDataSQLUpdateType::class, $userDataUpdated);
            $form->handleRequest($request);

            //detecting if the input is correct
            if ($form->isSubmitted() && $form->isValid()) {
                //updating data on the user
                $userDataUpdated = $form->getData();

                $userData->setName($userDataUpdated->getName());
                $userData->setSurname($userDataUpdated->getSurname());
                $userData->setAge($userDataUpdated->getAge());
                $userData->setPassword($userDataUpdated->getPassword());
                $entityManager->flush();

                return new Response(
                    '<html><body>Data on the user was updated</body></html>'
                );
            }

            return $this->render('user_data_sql/form.html.twig', [
                'form' => $form,
                'signup' => 0,
            ]);
        }

    }

    //find sb by name
    #[Route('/user_data_sql/{name}', name: 'user_data_showByName')]
    public function showByName(UserDataSQL $userData): Response
    {


        if (!$userData) {
            throw $this->createNotFoundException(
                'No user found for name '
            );
        }

        return $this->render('user/userData.html.twig', [
            'userData' => $userData,
        ]);

    }

    #[Route('/user/data/sql', name: 'app_user_data_s_q_l')]
    public function index(): Response
    {
        return $this->render('user_data_sql/index.html.twig', [
            'controller_name' => 'UserDataSQLController',
        ]);
    }
}
