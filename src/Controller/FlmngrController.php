<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FlmngrController extends AbstractController
{

    #[Route('/flmngr', name: 'flmngr')]
    public function flmngr(): Response
    {
        \EdSDK\FlmngrServer\FlmngrServer::flmngrRequest(
            array(
                'dirFiles' => $this->getParameter('kernel.project_dir') . '/public/files'
            )
        );

        // As far Flmngr returns a response itself,
        // you must use "die" here to prevent a error.
        die;
    }


    #[Route('/', name: 'flmngr_example')]
    public function flmngrExample(): Response
    {
        return $this->render('flmngr-example.html');
    }

    public static function getSubscribedServices(): array {
        return parent::getSubscribedServices();
    }
}