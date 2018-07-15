<?php
/**
 * Created by PhpStorm.
 * User: nas
 * Date: 13/07/18
 * Time: 20:44
 */

namespace App\Controller;


use App\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Persistence\ObjectManager;


class ArticleController extends AbstractController
{

    /**
     * @Route("/" ,name="app_homepage")
     */
    public function homepage(){

        return $this->render('article/homepage.html.twig');
    }
    /**
     * @Route("/create",name="create")
     */
    public function create(Request $request ,ObjectManager $manager){
        dump($request);
        if($request->request->count()>0){

            $article = new Article();
            $article->setTitle($request->request->get('title'))
                    ->setContent($request->request->get('content'))
                    ->setImage($request->request->get('image'))
                     ->setCreatedAt(new \DateTime());
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('article_show',['id'=>$article->getID()]);
        }



        return $this->render('article/create.html.twig');
    }

    /**
     * @Route("/news/{id} ",name="article_show")
     */
    public function show( $id ){
        $comments=[
            'Life is shit','Why not telling this ','But Who gives a fuck about this code ','Gonna go shower !! '
        ];
        $repo=$this->getDoctrine()->getRepository(Article::class);


            $articles=$repo->findById($id);




        return $this->render('article/show.html.twig',[
            'id'=>$id,
            'comments'=>$comments,
            'article'=>$articles
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

