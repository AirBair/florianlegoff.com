<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\ContentRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillGroupRepository;
use App\Repository\SocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * Homepage.
     *
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * About section of homepage.
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
     * Projects section of homepage.
     */
    public function projects(ProjectRepository $projectRepository): Response
    {
        return $this->render('_projects.html.twig', array(
            'projects' => $projectRepository->findBy([], ['position' => 'ASC']),
        ));
    }

    /**
     * Skills section of homepage.
     */
    public function skills(SkillGroupRepository $skillGroupRepository): Response
    {
        return $this->render('_skills.html.twig', array(
            'skillGroups' => $skillGroupRepository->findBy([], ['position' => 'ASC']),
        ));
    }

    /**
     * Contact section of homepage.
     *
     * @Route("/contact", name="contact")
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
            if (false === $request->isXmlHttpRequest()) {
                $response = $this->redirect(
                    $this->generateUrl('homepage').'#contact'
                );
            } else {
                $response = $this->redirectToRoute('contact');
            }
        }

        return $response ?? $this->render('_contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Footer section of homepage.
     */
    public function footer(ContentRepository $contentRepository): Response
    {
        return $this->render('_footer.html.twig', array(
            'hosting' => $contentRepository->findOneByLabel('hosting'),
            'license' => $contentRepository->findOneByLabel('license'),
        ));
    }

    /**
     * Change the language of the website.
     *
     * @Route("/language/{locale}", name="change_language", requirements={"locale": "fr|en"})
     */
    public function changeLanguageAction(Request $request, String $locale): RedirectResponse
    {
        $request->getSession()->set('_locale', $locale);

        return $this->redirect($request->headers->get('referer') ?? $request->getSchemeAndHttpHost());
    }
}
