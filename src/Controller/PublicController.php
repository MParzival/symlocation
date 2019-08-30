<?php

namespace App\Controller;

use App\Repository\DriverRepository;
use App\Repository\RentalRepository;
use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(DriverRepository $driverRepository, VehicleRepository $vehicleRepository, RentalRepository $rentalRepository)
    {
        return $this->render('public/home.html.twig', [
            'drivers'=>$driverRepository->findAll(),
            'i' => $driverRepository->getNb(),
            'j' => $vehicleRepository->getNb(),
            'k'=> $rentalRepository->getNb()
            /*'l'=>$vehicleRepository->getVoitureOff()*/

        ]);
    }
}
