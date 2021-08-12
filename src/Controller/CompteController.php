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
 * Description of CompteController
 *
 * @author vielf
 */
class CompteController extends AbstractController{
    
      /**
     *
     * @var Utilisateur
     */
    private $utilisateur;
    
     function __construct() {
       
    }

    
    /**
     * @Route ("/compte/{id}", name="compte", methods={"GET"})
     * @IsGranted("ROLE_USER")
     * @return Response
     */
    public function index($id):Response {
        
        //$this->denyAccessUnlessGranted('ROLE_USER');
        //$lesComptes = $user->getComptes();
        //$lesComptes = $compteRepository->findByIdutilisateur($user->getId());
        //dd($lesComptes[1]->getPourcentageBudgetDepense());
        return $this->render("pages/affichercompte.html.twig"
        );
    }
}
