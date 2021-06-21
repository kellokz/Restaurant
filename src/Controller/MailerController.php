<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

class MailerController extends AbstractController
{
    #[Route('/mail', name: 'mail')]
    public function sendmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('tisch1@menukarte.wip')
            - to('kellner@menukarte.wip')
            ->subject('Bestellung')
            - text('extra Pommes');

        $mailer - send($email);

        return new Response('email versendet');
    }
}
