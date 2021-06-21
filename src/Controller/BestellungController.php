<?php

namespace App\Controller;

use App\Entity\Gericht;
use App\Entity\Bestellung;
use App\Entity\KundenDaten;
use App\Form\KundenDatenType;
use App\Repository\BestellungRepository;
use App\Repository\KundenDatenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BestellungController extends AbstractController
{
    #[Route('/bestellung', name: 'bestellung')]
    public function index(BestellungRepository $bestellungRepository)
    {
        $bestellung = $bestellungRepository->findBy(
            ['tisch' => 'tisch1']
        );

        return $this->render('bestellung/index.html.twig', [
            'bestellungen' => $bestellung,
        ]);
    }
    #[Route('/bestellen/{id}', name: 'bestellen')]
    public function bestellen(Gericht $gericht)
    {
        $bestellung = new Bestellung();
        $bestellung->setTisch('tisch1');
        $bestellung->setName($gericht->getName());
        $bestellung->setBnummer($gericht->getId());
        $bestellung->setPreis($gericht->getPreis());
        $bestellung->setStatus('offen');
        //entity Manager

        $em = $this->getDoctrine()->getManager();
        $em->persist($bestellung);
        $em->flush();
        $this->addFlash('bestell', $bestellung->getName() . ' wurde zur Bestellung hinzugefügt');

        return $this->redirect($this->generateUrl('menu'));
    }

    #[Route('/status/{id},{status}', name: 'status')]
    public function status($id, $status)
    {

        $em = $this->getDoctrine()->getManager();
        $bestellung = $em->getRepository(Bestellung::class)->find($id);
        $bestellung->setStatus($status);
        $em->flush();

        return $this->redirect($this->generateUrl('bestellung'));
    }

    #[Route('/loeschen/{id}', name: 'loeschen')]
    public function entfernen($id, BestellungRepository $br)
    {
        $em = $this->getDoctrine()->getManager();
        $bestellung = $br->find($id);
        $em->remove($bestellung);
        $em->flush();

        return $this->redirect($this->generateUrl('bestellung'));
    }

    #[Route('/bestellungAufgeben/{sum}', name: 'bestellungAufgeben')]
    public function bestellungAufgeben($sum, Request $request, BestellungRepository $br)
    {
        $bestellung = $br->findAll();

        $kundenDaten = new KundenDaten();
        $form = $this->createForm(KundenDatenType::class, $kundenDaten,);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kundenDaten);
            $em->flush();
            return $this->render('bestellung/bestellungsuccess.html.twig');
        }

        if ($sum >= 10) {
            return $this->render('bestellung/kundendaten.html.twig', [
                'kundendaten' => $form->createView(), 'bestellungen' => $bestellung
            ]);
        } else {
            $this->addFlash('bestellwert', 'Der Mindestbestellwert ist 10Euro');
        }
        return $this->redirect($this->generateUrl('bestellung'));
    }
}
