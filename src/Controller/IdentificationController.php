<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of IdentificationController
 *
 * @author vielf
 */
class IdentificationController {
    //put your code here
    
    /**
     * @Route ("/", name="identification")
     * @return Response
     */
    public function index():Response {
        return new Response('Hello world !');
    }
}
