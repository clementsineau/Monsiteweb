<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/11/2017
 * Time: 14:35
 */

namespace OC\PlatformBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AnnonceController extends Controller
{
    public function indexAction($page)
    {
        /*$content = $this->get('templating')->render('OCPlatformBundle:Annonce:index.html.twig');

        return new Response($content);*/

        if ($page < 1) {

            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        // Test d'annonce en dur
        $listeAnnonce = array(
            array(
                'titre'   => 'Recherche développpeur Symfony',
                'id'      => 1,
                'auteur'  => 'Alexandre',
                'contenu' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
                'date'    => new \Datetime()),
            array(
                'titre'   => 'Mission de webmaster',
                'id'      => 2,
                'auteur'  => 'Hugo',
                'contenu' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                'date'    => new \Datetime()),
            array(
                'titre'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'auteur'  => 'Mathieu',
                'contenu' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime())
        );
        return $this->render('OCPlatformBundle:Annonce:index.html.twig', array(
            'listeAnnonce' => $listeAnnonce,
        ));
    }

    public function viewAction($id)
    {

        $annonce = array(
            'titre'   => 'Recherche développpeur Symfony',
            'id'      => $id,
            'auteur'  => 'Alexandre',
            'contenu' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
            'date'    => new \Datetime()
        );
        return $this->render('OCPlatformBundle:Annonce:view.html.twig', array(
            'annonce' => $annonce
        ));

        /*  // réponse en JSON, grâce à la fonction json_encode()
       $response = new Response(json_encode(array('id' => $id)));

       // On va définir le Content-type pour dire au navigateur que l'on renvoie du JSON et non du HTML
       $response->headers->set('Content-Type', 'application/json');

       return $response;*/
    }

    public function addAction(Request $request)
    {

        if ($request->isMethod('POST')) {

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('oc_platform_view', array('id' => 5));
        }

        return $this->render('OCPlatformBundle:Annonce:add.html.twig');
    }

    public function editAction($id, Request $request)
    {

        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

            return $this->redirectToRoute('oc_platform_view', array('id' => 5));
        }

        $annonce = array(
            'titre'   => 'Recherche développpeur Symfony',
            'id'      => $id,
            'auteur'  => 'Alexandre',
            'contenu' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
            'date'    => new \Datetime()
        );

        return $this->render('OCPlatformBundle:Annonce:edit.html.twig', array(
            'annonce' => $annonce,
        ));
    }

    public function deleteAction($id)
    {

        return $this->render('OCPlatformBundle:Annonce:delete.html.twig');
    }


    ///////////////////////////////////////////////

    public function menuAction()
    {

        $listeAnnonce = array(
            array('id' => 2, 'titre' => 'Recherche développeur Symfony'),
            array('id' => 5, 'titre' => 'Mission de webmaster'),
            array('id' => 9, 'titre' => 'Offre de stage webdesigner')
        );

        return $this->render('OCPlatformBundle:Annonce:menu.html.twig', array(

            'listeAnnonce' => $listeAnnonce
        ));
    }
}