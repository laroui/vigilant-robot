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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{
    /**
     * @Route("/" ,name="app_homepage")
     */
    public function homepage(){

        return $this->render('article/homepage.html.twig');
    }
    /**
     * @Route("/news/{slug} ",name="article_show")
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

    /**
     * @Route("/news/{slug}/heart",name="article_toggle_heart",methods={"POST"})
     */
    public function toggleArticleHeart($slug){
        // TODO -actually heart/unheart from the article !
        return new JsonResponse(['hearts' => rand(5,100)]);



    }

}

