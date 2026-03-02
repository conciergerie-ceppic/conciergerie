<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Repository\MessageRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(Request $req, MessageRepository $MsgRepo, EntityManagerInterface $emi): Response
    {
        $data = $req->request->all();
         if (!$data ) {
          $error = "Veuillez renseigner tout les champs";
          return $this->render("home/index.html.twig", [
            'error' => $error,
          ]); 
         }
        $message = new Message();
        $first_name = $data["first_name"] ?? '';
        $last_name = $data["last_name"] ?? '';
        $email = $data["email"] ?? '';
        $phone = $data["phone"] ?? '';
        $subject = $data["subject"] ?? '';
        $content = $data["content"] ?? '';
        $message->setFirstName($first_name);
        $message->setLastName($last_name);
        $message->setEmail($email);
        $message->setPhone($phone);
        $message->setSubject($subject);
        $message->setContent($content);
        $message->setCreatedAt(new DateTimeImmutable());
        $emi->persist($message);
        $emi->flush();
        return $this->render('message/index.html.twig', [
            'first_name' => $first_name,
        ]);
    }
}
