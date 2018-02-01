<?php

namespace App\Controller;

use App\Repository\ContentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * Homepage
     *
     * @Route("/", name="homepage")
     *
     * @param  Request           $request
     * @param  ContentRepository $contentRepository
     *
     * @return Response
     */
    public function index(Request $request, ContentRepository $contentRepository): Response
    {
        $about = $contentRepository->findOneByLabel('about');
        $cv = $contentRepository->findOneByLabel('curriculum_vitae');

        return $this->render('index.html.twig', array(
            'about' => ($about) ? $about->getContent($request->getLocale()) : null,
            'curriculum_vitae' => ($cv) ? $cv->getContent($request->getLocale()) : null,
        ));
    }
}
