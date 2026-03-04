<?php

namespace App\Controller;

use App\Entity\Message;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(Request $req, EntityManagerInterface $emi): Response
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
        }
        return $this->render('message/index.html.twig', [
            'first_name' => $first_name,
            'error' => $error,
        ]);
    }
}
