<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/11/2017
 * Time: 14:35
 */

namespace OC\PlatformBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnnonceController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Annonce:index.html.twig');

        return new Response($content);
    }
}