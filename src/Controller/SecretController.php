<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Description of SecretController
 *
 * @author vielf
 */
class SecretController extends AbstractController {
    //put your code here
    
    
     function __construct() {
       
    }

    
    /**
     * @Route ("/secret", name="secret", methods={"GET"})
     * @IsGranted
     * @return Response
     */
    public function index():Response {
        //$this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render("pages/secret.html.twig");
    }
    
}
