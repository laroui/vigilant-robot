<?php
/**
 * Created by PhpStorm.
 * User: nas
 * Date: 13/07/18
 * Time: 20:44
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(){

        return new Response('OmG my first page already');
    }
    /**
     * @Route("/news/{slug}")
     */
    public function show($slug){
        $comments=[
            'Life is shit','Why not telling this ','But Who gives a fuck about this code ','Gonna go shower !! '
        ];

        return $this->render('article/show.html.twig',[

            'title'=>ucwords(str_replace('_','',$slug)),
            'comments'=>$comments
        ]);

    }

}

