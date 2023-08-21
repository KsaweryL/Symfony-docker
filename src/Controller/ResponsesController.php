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

    function Transpose($arr) {
        $out = array();
        foreach ($arr as $key => $subarr) {
            foreach ($subarr as $subkey => $subvalue) {
                $out[$subkey][$key] = $subvalue;
            }
        }
        return $out;
    }

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

        return new JsonResponse(['usersJson' => $usersDecoded]);
    }

}