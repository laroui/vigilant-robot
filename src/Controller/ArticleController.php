<?php
/**
 * Created by PhpStorm.
 * User: nas
 * Date: 13/07/18
 * Time: 20:44
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class ArticleController
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

        return new Response(sprintf('future page to display article :%s',$slug));


    }

}

