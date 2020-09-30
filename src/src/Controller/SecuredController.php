<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecuredController extends AbstractController
{
    /**
     * @Route("/secured", name="secured")
     */
    public function index()
    {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('secured/index.html.twig', [
                'controller_name' => 'SecuredController',
            ]);
        } else {
            return $this->render('secured/error.html.twig', ['error' => 'not_connected', 'controller_name' => 'SecuredController']);
        }
    }
}
