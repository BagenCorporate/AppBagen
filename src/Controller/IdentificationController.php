<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\UserRegistrationFormType;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Exception\LogicException;

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
    function __construct(UtilisateurRepository $utilisateurRepository, EntityManagerInterface $om) {
        $this->utilisateurRepository = $utilisateurRepository;
    }

    
    /**
     * @Route ("/register", name="register", methods={"GET","POST"})
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $om):Response {
        $form = $this->createForm(UserRegistrationFormType::class);
        //dd($form);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $utilisateur = $form->getData();
            
            $plainMotdepasse = $form['PlainMotdepasse']->getData();
            
            
            $utilisateur->setMotdepasse($passwordEncoder->encodePassword($utilisateur, $plainMotdepasse));
            
            $om->persist($utilisateur);
            $om->flush();
            
            $this->addFlash('succes', 'Utilisateur créé avec succès !');
            
            return $this->redirect('accueil');
        }
        
        return $this->render("pages/register.html.twig",[
            'registrationForm' => $form->createView()
        ]);
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
    
    
    /**
     * @Route ("/test/{id}", name="test", methods={"GET","POST"})
     * @return Response
     */
    public function test($id):Response {
        dd($id);
        //$utilisateur = $this->utilisateurRepository->findByMailMotDePasse($mail, $mdp);
        return $this->render("pages/identification.html.twig",['etat' => $this->etat
        ]);
    }
}
