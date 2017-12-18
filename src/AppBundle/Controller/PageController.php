<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

use AppBundle\Entity\Articles;

class PageController extends Controller
{
    /**
     * @Route("/",name="home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $data = array();
        
        
        
        $em = $this->getDoctrine()->getManager();
        /*
        for($i=1;$i<100;$i++){
            $articles = new Articles();
            $articles->setTitle($i.' запись!');
            $articles->setDateCreate('2017-06-'.$i.' 18:15:00');
            $articles->setUserCreate($i);
            $em->persist($articles);
            $em->flush();
        }
        */
        
        
        
        // $em = $this->getDoctrine()->getManager();
        
         //$qb = $em->createQueryBuilder();
        /*
        $query = $em->createQuery(
            'SELECT * FROM pages'
        );

        $pages = $query->getResult();
        */
        $session = $request->getSession();

        $page_session = $session->get('page_session');
        
        
        
        $data['page_session'] = $page_session;
        //dump($data);
        //die;
        $template = $this->container->get('templating');
        //$html = $template->render('maintemplate.html.twig');
        //$html .= $this->render('pages/head.html.twig');
        //$html .= $this->render('pages/header.html.twig');
        $html = $this->render('pages/index.html.twig',$data);
        //$html .= $this->render('pages/sidebar.html.twig');
        //$html .= $this->render('pages/footer.html.twig');
        return new Response($html);
    }
    
    /**
     * @Route("/page/{pagename}", name="show_page")
     */
    
    public function indexshowpage(Request $request,$pagename)
    {
        // replace this example code with whatever you need
        $data = array();
        $session = $request->getSession();
        $page_session = $session->set('page_session',$pagename);
        dump($page_session);
        
        $data['page'] = $pagename;
        $template = $this->container->get('templating');
        //$html = $template->render('maintemplate.html.twig');
        //$html .= $this->render('pages/head.html.twig');
        //$html .= $this->render('pages/header.html.twig');
        $html = $this->render('pages/show_page.html.twig',$data);
        //$html .= $this->render('pages/sidebar.html.twig');
        //$html .= $this->render('pages/footer.html.twig');
        return new Response($html);
    }
}
