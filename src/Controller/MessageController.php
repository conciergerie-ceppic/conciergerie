<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(Request $req, EntityManagerInterface $emi, MailerInterface $mailer): Response
    {
        $error = null;
        $data = $req->request->all();

        $message = new Message();
        $first_name = $data["first_name"] ?? '';
        $last_name = $data["last_name"] ?? '';
        $email = $data["email"] ?? '';
        $phone = $data["phone"] ?? '';
        $subject = $data["subject"] ?? '';
        $content = $data["content"] ?? '';

        if (
            empty($first_name) ||
            empty($last_name) ||
            empty($email) ||
            empty($phone) ||
            empty($subject) ||
            empty($content)
        ) {
            $error = "Veuillez renseigner tout les champs";
        } else {

            $message->setFirstName($first_name);
            $message->setLastName($last_name);
            $message->setEmail($email);
            $message->setPhone($phone);
            $message->setSubject($subject);
            $message->setContent($content);
            $message->setCreatedAt(new DateTimeImmutable());
            $emi->persist($message);
            $emi->flush();

            // Envoi de la confirmation de contact
            $confirmationEmail = (new Email())
                ->from('no-reply@conciergerie.com')
                ->to($email)
                ->subject('Demande de contact Premium Experience !')
                ->text('Votre demande de contact a bien été prise en compte. Notre équipe reviendra vers vous au plus vite ! ');
            $mailer->send($confirmationEmail);
        }
        return $this->render('message/index.html.twig', [
            'first_name' => $first_name,
            'error' => $error,
        ]);
    }
}
