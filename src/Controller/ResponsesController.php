<?php

namespace App\Controller;

use App\Entity\UserDataSQL;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;

class ResponsesController extends AbstractController
{

    //returning json response of all users
    #[Route('/user_data_sql/jsonAllUsers')]
    public function jsonAllUsers(EntityManagerInterface $entityManager){
        $allUsers = $entityManager->getRepository(UserDataSQL::class)->findAll();

        //serialising information about the user to json
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $usersJson = $serializer->serialize($allUsers, 'json');

        //decoding json data and converting it into associative array
        $usersDecoded = json_decode($usersJson, true);

        //writing info to the file
        // pointer in writable mode
        $file_pointer = fopen('csv/user.csv', 'w');
        foreach($usersDecoded as $i){
            // Write the data to the CSV file
            fputcsv($file_pointer, $i);
        }
        // Close the file pointer.
        fclose($file_pointer);

        return new JsonResponse(['usersJson' => $usersDecoded]);
    }

    //gets a request containing datagrid information and puts it in the database
    #[Route('/user_data_sql/fromGridToDB')]
    public function fromGridToDB(EntityManagerInterface $entityManager){

        $changedData = $_REQUEST['changedData']['usersJson'];

        for($row = 0; $row<count($changedData); $row++){
            //find a user in the database by matching the id
            $userToBeChanged = $entityManager->getRepository(UserDataSQL::class)->findOneBy([
                'id' => $changedData[$row]['id']
            ]);

//            //update data only if there is a difference           //doesn't work
            if($userToBeChanged != $changedData) {
                $depsacito = true;
            }else $depsacito = false;

                //update data on the given user
                $userToBeChanged->setTask($changedData[$row]['task']);
                $userToBeChanged->setDueDateFromString($changedData[$row]['dueDate']);      //experimental solution
                $userToBeChanged->setName($changedData[$row]['name']);
                $userToBeChanged->setSurname($changedData[$row]['surname']);
                $userToBeChanged->setAge($changedData[$row]['age']);
                $userToBeChanged->setAdmin(filter_var($changedData[$row]['admin'], FILTER_VALIDATE_BOOLEAN));          //it's broken lol
                $userToBeChanged->setEmail($changedData[$row]['email']);
                $userToBeChanged->setPassword($changedData[$row]['password']);
                $userToBeChanged->setCheckbox(filter_var($changedData[$row]['checkbox'], FILTER_VALIDATE_BOOLEAN));    //it's broken lol

                $entityManager->flush();
//                break;
//            }
        }

    }

}