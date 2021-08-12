<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Repository\CompteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use function dd;

/**
 * Description of AccueilUtilisateurController
 *
 * @author vielf
 */
class AccueilUtilisateurController extends AbstractController {
    //put your code here
    
    /**
     *
     * @var Utilisateur
     */
    private $utilisateur;
    
     function __construct() {
       
    }

    
    /**
     * @Route ("/accueil/utilisateur", name="accueil.utilisateur", methods={"GET"})
     * @IsGranted("ROLE_USER")
     * @return Response
     */
    public function index(Request $request, UserInterface $user, CompteRepository $compteRepository ):Response {
        
        //$this->denyAccessUnlessGranted('ROLE_USER');
        //$lesComptes = $user->getComptes();
        $lesComptes = $compteRepository->findByIdutilisateur($user->getId());
        //dd($lesComptes[1]->getPourcentageBudgetDepense());
        return $this->render("pages/accueilutilisateur.html.twig",[
            'lesComptes' => $lesComptes
        ]);
    }
}
