<?php
// src/Controller/LuckyController.php
//used also for testing various features
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    function obfuscateUrl($url) {
        return base64_encode($url);
    }

    function deobfuscateUrl($obfuscatedUrl) {
        return base64_decode($obfuscatedUrl);
    }

    //#[Route('/lucky/number')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }

    #[Route('/test')]
    public function test(): Response
    {
        $number = 2;
        $actualUrl = 'http://localhost:10301/test';
        $obfuscatedUrl = $this->obfuscateUrl($actualUrl);

        return $this->render('test/child.html.twig',[
            'number' => $number,
            'obfuscatedUrl' => $obfuscatedUrl
        ]);
    }

    #[Route('/scss_test')]
    public function test_scss(): Response
    {
        $number = 2;
        $actualUrl = 'http://localhost:10301/test';
        $obfuscatedUrl = $this->obfuscateUrl($actualUrl);

        return $this->render('test/scss/index.html.twig');
    }

    #[Route('/scss_file', name: 'scss_file')]
    public function scss_file(): Response
    {
        return $this->render('test/scss/main.css');
    }
}


?>