<?php

namespace App\Controller;

use App\Entity\SelectUser;
use App\Entity\UserDataSQL;
use App\Entity\UsersTasks;
use App\Entity\WelcomePage;
use App\Entity\LoginPage;
use App\Form\Type\UserDataSQLType;
use App\Form\Type\LoginPageType;
use App\Form\Type\UserDataSQLUpdateType;
use App\Form\Type\SelectUserType;
use App\Form\Type\WelcomePageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
            'admin' => true]))
        {
            $adminAccount = new UserDataSQL();
            $adminAccount
                ->setName("Admin")
                ->setPassword("admin")
                ->setSurname("Admin")
                ->setAge(32)
                ->setEmail("admin@email.com")
                ->setCheckbox(true)
            ->setAdmin(true);
            //$adminAccount->setId(0);      //doesn't matter, since persist() then changes it


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
            'url5' => "",
            'text5' => "",
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
        //if admin's email and password is detected, proceed        //fix
        if($email == $entityManager->getRepository(UserDataSQL::class)->findOneBy([
            'admin' => 1
            ])->getEmail()
            && $password == $entityManager->getRepository(UserDataSQL::class)->findOneBy([
                'admin' => 1
            ])->getPassword()) {
//            $userData = new UserDataSQL();
//            $form = $this->createForm(UserDataSQLType::class, $userData);
//            $form->handleRequest($request);

            $userData = new SelectUser();
            $form = $this->createForm(SelectUserType::class, $userData);
            $form->handleRequest($request);

            //detecting if the input is correct
            if ($form->isSubmitted() && $form->isValid()) {

                $form = $form->getData();
                $userToBeDeleted = $entityManager->getRepository(UserDataSQL::class)->findOneBy(
                    ['name' => $form->getName(),
                        'surname' => $form->getSurname(),
                        'email' => $form->getEmail()]);

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
                $form = $this->createForm(SelectUserType::class, $userData);
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
        if($email == $entityManager->getRepository(UserDataSQL::class)->findOneBy([
                'admin' => 1
            ])->getEmail()
            && $password == $entityManager->getRepository(UserDataSQL::class)->findOneBy([
                'admin' => 1
            ])->getPassword()) {
            $allUsers = $entityManager->getRepository(UserDataSQL::class)->findAll();

            //in case there were no user in the database
            if (!$allUsers) {
                return new Response(
                    '<html><body>There are no users in the database</body></html>'
                );
            } else {

                return $this->render('user/usersDisplay.html.twig', [
                    'allUsers' => $allUsers
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
        #determining user's tasks
        $userTasks = $entityManager->getRepository(UsersTasks::class)->findBy([
            'user_id' => $user->getId()
        ]);
        if (!$user) {
            throw $this->createNotFoundException(
                'No user found'
            );
        }
        else {
            //serialising information about the user to json
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];

            $serializer = new Serializer($normalizers, $encoders);

            //getting all users
            $usersAll = $entityManager->getRepository(UserDataSQL::class)->findAll();

            $usersJson = $serializer->serialize($usersAll, 'json');
            //decoding json data and converting it int associative array
            $usersDecoded = json_decode($usersJson, true);
            // File pointer in writable mode
//            $file_pointer = fopen('csv/user.csv', 'w');
//            foreach($usersDecoded as $i){
//                // Write the data to the CSV file
//                fputcsv($file_pointer, $i);
//            }
//            // Close the file pointer.
//            fclose($file_pointer);

            //displaying the buttons as well as info
            $currentDirectory = $request->getPathInfo();
            $userUpdateUrl = str_replace('panel', 'update', $currentDirectory);
            $userUpdateUrlTask = str_replace('panel', 'task', $currentDirectory);
            $userUpdateUrlDeleteTask = str_replace('panel', 'delete_task', $currentDirectory);
            //due to its unusual structure, it needs to be passed separately
            if($user->getDueDate()) $userDueDate = $user->getDueDate();
            else $userDueDate = "none";

            if ($email == $entityManager->getRepository(UserDataSQL::class)->findOneBy([
                    'admin' => 1
                ])->getEmail() && $password == $entityManager->getRepository(UserDataSQL::class)->findOneBy([
                    'admin' => 1
                ])->getPassword()) {
                $userUpdateUrlDisplay = str_replace('panel', 'display', $currentDirectory);
                $userUpdateUrlDelete = str_replace('panel', 'delete', $currentDirectory);
                return $this->render('user/button/btn.html.twig', [
                    'url' => $userUpdateUrl,
                    'text' => "Update info",
                    'url2' => $userUpdateUrlTask,
                    'text2' => "Add a task",
                    'url3' => $userUpdateUrlDeleteTask,
                    'text3' => "Delete a task",
                    'url4' => $userUpdateUrlDisplay,
                    'text4' => "Display users",
                    'url5' => $userUpdateUrlDelete,
                    'text5' => "Delete a user",
                    'user' => $user,
                    'userDueDate' => $userDueDate,
                    'userTasks' => $userTasks
                ]);
            } else {
                return $this->render('user/button/btn.html.twig', [
                    'url' => $userUpdateUrl,
                    'text' => "Update info",
                    'url2' => $userUpdateUrlTask,
                    'text2' => "Add a task",
                    'url3' => $userUpdateUrlDeleteTask,
                    'text3' => "Delete a task",
                    'url4' => "",
                    'text4' => "",
                    'url5' => "",
                    'text5' => "",
                    'user' => $user,
                    'userDueDate' => $userDueDate,
                    'userTasks' => $userTasks
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
