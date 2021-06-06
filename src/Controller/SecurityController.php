<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registration", name="security_registration")
     */
    public function Registration(Request $request, UserPasswordEncoderInterface $encoder) {

        $user = new Users();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('security/login.html.twig');
        }

        return $this->render('security/registration.html.twig',[
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/login", name="security_login")
     */
    public function login() {
        return $this->render('security/login.html.twig');
    } 

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout() {}
}

