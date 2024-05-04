<?php

namespace App\Controller\trainingvideos;

use App\Entity\trainingvideos\Video;
use App\Form\trainingvideos\VideoType;
use App\Repository\trainingvideos\CategoryRepository;
use App\Repository\trainingvideos\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * @Route("/video")
 */
class VideoController extends AbstractController
{
    /*
     * @Route("/", name="app_video_index", methods={"GET"})
     */
    public function index(VideoRepository $videoRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('training_videos/video/dashboard.html.twig', [
            'videos' => $videoRepository->findAll(),
            'categories' => $categoryRepository->findAll(),

        ]);
    }

    /*
     * @Route("/", name="app_video_search", methods={"GET", "POST"})
     */
    public function search(VideoRepository $videoRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('training_videos/video/dashboard.html.twig', [
            'videos' => $videoRepository->findAll(),
            'categories' => $categoryRepository->findAll(),

        ]);
    }


    /*
     * @Route("/update/{status}/{id}", name="update_status", methods={"GET", "POST"})
     */
    public function updateStatus(VideoRepository $videoRepository,CategoryRepository $categoryRepository, $status, $id, EntityManagerInterface $entityManager)
    {
        $id = (int)$id;
        $videos = $videoRepository->find($id);

        if (!$videos) {
            throw $this->createNotFoundException('Video not found with id ' . $id);
        }

        $videos->setStatus($status);

        $entityManager->flush();

        return $this->redirectToRoute('app_video_index');

    }


    /*
     * @Route("/form", name="app_video_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $lien = $video->getEmbedVideoLink();
            preg_match('/\/embed\/([^?]+)/', $lien, $matches);

            if (isset($matches[1])) {
                $videoId = $matches[1];
                $video->setStatus($videoId);
            }

            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('app_video_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('training_videos/video/new.html.twig', [
            'video' => $video,
            'form' => $form->createView(),
        ]);
    }

    /*
     * @Route("/{id}", name="app_video_show", methods={"GET"})
     */
    public function show(Video $video): Response
    {
        return $this->render('training_videos/video/show.html.twig', [
            'video' => $video,
        ]);
    }

    /*
     * @Route("/{id}/edit", name="app_video_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Video $video, VideoRepository $videoRepository): Response
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $videoRepository->add($video, true);

            return $this->redirectToRoute('app_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('training_videos/video/edit.html.twig', [
            'video' => $video,
            'form' => $form,
        ]);
    }

    /*
     * @Route("/{id}", name="app_video_delete", methods={"POST"})
     */
    public function delete(Request $request, Video $video, VideoRepository $videoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$video->getId(), $request->request->get('_token'))) {
            $videoRepository->remove($video, true);
        }

        return $this->redirectToRoute('app_video_index', [], Response::HTTP_SEE_OTHER);
    }

    /*
     * @Route("update/{category_id}", name="dashboard_category", methods={"GET", "POST"})
     */
    public function showShoesByStatus(Request $request,VideoRepository $videoRepository, CategoryRepository $categoryRepository,$category_id,EntityManagerInterface $entityManager): Response
    {

        $category = $categoryRepository->find($category_id);

        return $this->render('training_videos/video/dashboard.html.twig', [
            'videos' => $videoRepository->findBy(['category' => $category]),
            'categories' => $categoryRepository->findAll()
        ]);
    }
}

