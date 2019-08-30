<?php

namespace App\Controller;

use App\Entity\Driver;
use App\Entity\Rental;
use App\Form\DriverType;
use App\Form\RentalType;
use App\Repository\RentalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RentalController extends AbstractController
{
    /**
     * @Route("/rental", name="rental_index")
     */
    public function index(RentalRepository $repository)
    {

        return $this->render('rental/index.html.twig', [
            'rentals' => $repository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="rental_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rental = new Rental();
        $form = $this->createForm(RentalType::class, $rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rental);
            $entityManager->flush();

            return $this->redirectToRoute('rental_index');
        }

        return $this->render('rental/new.html.twig', [
            'rental' => $rental,
            'form' => $form->createView(),
        ]);
    }
}
