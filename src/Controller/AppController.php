<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\ContentRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillGroupRepository;
use App\Repository\SocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * Homepage
     *
     * @Route("/", name="homepage")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * About section of homepage
     *
     * @param  ContentRepository $contentRepository
     * @param  SocialRepository  $socialRepository
     *
     * @return Response
     */
    public function about(ContentRepository $contentRepository, SocialRepository $socialRepository): Response
    {
        return $this->render('_about.html.twig', array(
            'about' => $contentRepository->findOneByLabel('about'),
            'curriculum_vitae' => $contentRepository->findOneByLabel('curriculum_vitae'),
            'socials' => $socialRepository->findBy([], ['position' => 'ASC']),
        ));
    }

    /**
     * Projects section of homepage
     *
     * @param  ProjectRepository $projectRepository
     *
     * @return Response
     */
    public function projects(ProjectRepository $projectRepository): Response
    {
        return $this->render('_projects.html.twig', array(
            'projects' => $projectRepository->findBy([], ['position' => 'ASC']),
        ));
    }

    /**
     * Skills section of homepage
     *
     * @param  SkillGroupRepository $projectRepository
     *
     * @return Response
     */
    public function skills(SkillGroupRepository $skillGroupRepository): Response
    {
        return $this->render('_skills.html.twig', array(
            'skillGroups' => $skillGroupRepository->findBy([], ['position' => 'ASC']),
        ));
    }

    /**
     * Contact section of homepage
     *
     * @Route("/contact", name="contact")
     *
     * @return Response|RedirectResponse
     */
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $message = new Message();

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($message);
            $em->flush();

            $this->addFlash('success-message', $message->getSubject());

            // Allow & Handle message submission without javascript
            if ($request->isXmlHttpRequest() === false) {
                return $this->redirect(
                    $this->generateUrl('homepage').'#contact'
                );
            } else {
                return $this->redirectToRoute('contact');
            }
        }

        return $this->render('_contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Footer section of homepage
     *
     * @param  ContentRepository $contentRepository
     *
     * @return Response
     */
    public function footer(ContentRepository $contentRepository): Response
    {
        return $this->render('_footer.html.twig', array(
            'hosting' => $contentRepository->findOneByLabel('hosting'),
            'license' => $contentRepository->findOneByLabel('license'),
        ));
    }

    /**
     * Change the language of the website
     *
     * @Route("/language/{locale}", name="change_language", requirements={"locale": "fr|en"})
     *
     * @param  Request $request
     * @param  String  $locale
     *
     * @return RedirectResponse
     */
    public function changeLanguageAction(Request $request, String $locale): RedirectResponse
    {
        $request->getSession()->set('_locale', $locale);

        return new RedirectResponse($request->headers->get('referer') ?? $request->getSchemeAndHttpHost());
    }
}
