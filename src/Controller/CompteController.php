<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\BudgetRepository;
use App\Repository\CompteRepository;
use App\Repository\UtilisateurRepository;
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
    public function index($id, CompteRepository $compteRepository):Response {
        $leCompte = $compteRepository->findOneById($id);
        //dd($leCompte);
        //$this->denyAccessUnlessGranted('ROLE_USER');
        //$lesComptes = $user->getComptes();
        //$lesComptes = $compteRepository->findByIdutilisateur($user->getId());
        //dd($lesComptes[1]->getPourcentageBudgetDepense());
        return $this->render("pages/affichercompte.html.twig",["compte" => $leCompte
                ]
        );
    }
    
    /**
     * @Route ("/compte/modifie/budget/{id}", name="compte.modifie.budget", methods={"GET"})
     * @IsGranted("ROLE_USER")
     * @return Response
     */
    public function modifieBudget($id, CompteRepository $compteRepository):Response {
        $leCompte = $compteRepository->findOneById($id);
        //dd($leCompte);
        //$this->denyAccessUnlessGranted('ROLE_USER');
        //$lesComptes = $user->getComptes();
        //$lesComptes = $compteRepository->findByIdutilisateur($user->getId());
        //dd($lesComptes[1]->getPourcentageBudgetDepense());
        return $this->render("pages/comptemodifiebudget.html.twig",["compte" => $leCompte
                ]
        );
    }
    
    /**
     * @Route ("/compte/valider/budget{id}", name="compte.valider.budget", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     * @return Response
     */
    public function validerBudget($id, CompteRepository $compteRepository, Request $request, UserInterface $user, BudgetRepository $budgetRepository):Response {
        $leCompte = $compteRepository->findOneById($id);
        $nouveauBudget = $request->get("montant");
        //dd($request->get("montant"));
        $date=date("Y-m-d");
        $budgetRepository->updateMontant($nouveauBudget, $id);
        $compteRepository->updateDateModif($id,$date);
        //dd($leCompte);
        //$this->denyAccessUnlessGranted('ROLE_USER');
        //$lesComptes = $user->getComptes();
        //$lesComptes = $compteRepository->findByIdutilisateur($user->getId());
        //dd($lesComptes[1]->getPourcentageBudgetDepense());
        return $this->redirectToRoute('compte',array('id' => $id));
    }
    
    
}
