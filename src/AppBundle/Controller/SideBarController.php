<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class SideBarController extends Controller
{
    public function recentArticlesAction($max = 3)
    {
        // make a database call or other logic
        // to get the "$max" most recent articles
        $data = array();
        $data['pages'] = array(
            'about',
            'contact',
            'blog'
        );
        $data['max'] = $max;
        dump($max);
        return $this->render('pages/side_bar_pages.html.twig',$data);
    }
}
