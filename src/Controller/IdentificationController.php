<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * Description of IdentificationController
 *
 * @author vielf
 */
class IdentificationController extends AbstractController {
    //put your code here
    
    /**
     *
     * @var UtilisateurRepository
     */
    private $utilisateurRepository;
  
    /**
     * 
     * @param UtilisateurRepository $utilisateurRepository
     */
    function __construct(UtilisateurRepository $utilisateurRepository) {
        $this->utilisateurRepository = $utilisateurRepository;
    }

    
    /**
     * @Route ("/", name="identification")
     * @return Response
     */
    public function index():Response {
        //$utilisateur = $this->utilisateurRepository->findByMailMotDePasse($mail, $mdp);
        return $this->render("pages/identification.html.twig");
    }
    
    /**
     * @Route ("/connexion", name="identification.connexion")
     * @param Request $request
     * @return Response
     */
    public function ajout(Request $request): Response {
        $mail = $request->get("mail");
        $mdp = $request->get("mdp");
        $utilisateur = $this->utilisateurRepository->findByMailMotDePasse($mail, $mdp);
        
        return $this->redirectToRoute('identification');
       
    }
}
