<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @var string
     */
    private $etat;
    
    public const OLD_MAIL = 'old_mail';
   
  
    /**
     * 
     * @param UtilisateurRepository $utilisateurRepository
     */
    function __construct(UtilisateurRepository $utilisateurRepository) {
        $this->utilisateurRepository = $utilisateurRepository;
    }

    
    /**
     * @Route ("/identification", name="identification", methods={"GET","POST"})
     * @return Response
     */
    public function index():Response {
        $this->etat = "0";
        //$utilisateur = $this->utilisateurRepository->findByMailMotDePasse($mail, $mdp);
        return $this->render("pages/identification.html.twig",['etat' => $this->etat
        ]);
    }
    
    /**
     * @Route ("/logout", name="logout", methods={"GET"})
     * @return Response
     */
    public function logout():Response {
        
        throw new LogicException('This method can be blank - it will be intercepted by the logout '
                . 'key on your firewall');
    }
    
    
    /**
     * @Route ("/erreur", name="identification.erreur")
     * @return Response
     */
    /*
    public function identificationErreur():Response {
        $this->etat = "1";
        //$utilisateur = $this->utilisateurRepository->findByMailMotDePasse($mail, $mdp);
        return $this->render("pages/identification.html.twig",['etat' => $this->etat
        ]);
    }*/
    
    
    /**
     * @Route ("/connexion", name="identification.connexion")
     * @param Request $request
     * @return Response
     */
    /*
    public function ajout(Request $request): Response {
        $mail = $request->get("mail");
        $mdp = $request->get("mdp");
        $utilisateur = $this->utilisateurRepository->findByMailMotDePasse($mail, $mdp);
        if($utilisateur == null){
            return $this->redirectToRoute('identification.erreur', array('champ'=>"1"));
        }else{
            return $this->redirectToRoute('accueil');
        }
        
       
    }*/
}
