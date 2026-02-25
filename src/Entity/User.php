<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatar = null;

    // ✅ mappedBy: 'user' correspond à $user dans Notification
    #[ORM\OneToMany(targetEntity: Notification::class, mappedBy: 'user')]
    private Collection $notifications;

    // ✅ mappedBy: 'sender' correspond à $sender dans Message
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'sender')]
    private Collection $sentMessages;

    // ✅ mappedBy: 'receiver' correspond à $receiver dans Message
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'receiver')]
    private Collection $receivedMessages;

    // ✅ mappedBy: 'user' correspond à $user dans UserFavoritePartner
    #[ORM\OneToMany(targetEntity: UserFavoritePartner::class, mappedBy: 'user')]
    private Collection $userFavoritePartners;

    // ✅ mappedBy: 'user' correspond à $user dans Reservation
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'user')]
    private Collection $reservations;

    public function __construct()
    {
        $this->notifications        = new ArrayCollection();
        $this->sentMessages         = new ArrayCollection();
        $this->receivedMessages     = new ArrayCollection();
        $this->userFavoritePartners = new ArrayCollection();
        $this->reservations         = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): static { $this->email = $email; return $this; }

    public function getUserIdentifier(): string { return (string) $this->email; }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }
    public function setRoles(array $roles): static { $this->roles = $roles; return $this; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(string $password): static { $this->password = $password; return $this; }

    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0" . self::class . "\0password"] = hash('crc32c', $this->password);
        return $data;
    }

    public function getFirstName(): ?string { return $this->first_name; }
    public function setFirstName(string $first_name): static { $this->first_name = $first_name; return $this; }

    public function getLastName(): ?string { return $this->last_name; }
    public function setLastName(string $last_name): static { $this->last_name = $last_name; return $this; }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(string $phone): static { $this->phone = $phone; return $this; }

    public function getAddress(): ?string { return $this->address; }
    public function setAddress(string $address): static { $this->address = $address; return $this; }

    public function getAvatar(): ?string { return $this->avatar; }
    public function setAvatar(?string $avatar): static { $this->avatar = $avatar; return $this; }

    // --- Notifications ---
    public function getNotifications(): Collection { return $this->notifications; }

    public function addNotification(Notification $notification): static
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications->add($notification);
            $notification->setUser($this); // ✅ setUser
        }
        return $this;
    }

    public function removeNotification(Notification $notification): static
    {
        if ($this->notifications->removeElement($notification)) {
            if ($notification->getUser() === $this) { // ✅ getUser
                $notification->setUser(null);
            }
        }
        return $this;
    }

    // --- Messages envoyés ---
    public function getSentMessages(): Collection { return $this->sentMessages; }

    public function addSentMessage(Message $message): static
    {
        if (!$this->sentMessages->contains($message)) {
            $this->sentMessages->add($message);
            $message->setSender($this);
        }
        return $this;
    }

    public function removeSentMessage(Message $message): static
    {
        if ($this->sentMessages->removeElement($message)) {
            if ($message->getSender() === $this) {
                $message->setSender(null);
            }
        }
        return $this;
    }

    // --- Messages reçus ---
    public function getReceivedMessages(): Collection { return $this->receivedMessages; }

    public function addReceivedMessage(Message $message): static
    {
        if (!$this->receivedMessages->contains($message)) {
            $this->receivedMessages->add($message);
            $message->setReceiver($this);
        }
        return $this;
    }

    public function removeReceivedMessage(Message $message): static
    {
        if ($this->receivedMessages->removeElement($message)) {
            if ($message->getReceiver() === $this) {
                $message->setReceiver(null);
            }
        }
        return $this;
    }

    // --- UserFavoritePartners ---
    public function getUserFavoritePartners(): Collection { return $this->userFavoritePartners; }

    public function addUserFavoritePartner(UserFavoritePartner $userFavoritePartner): static
    {
        if (!$this->userFavoritePartners->contains($userFavoritePartner)) {
            $this->userFavoritePartners->add($userFavoritePartner);
            $userFavoritePartner->setUser($this); // ✅ setUser
        }
        return $this;
    }

    public function removeUserFavoritePartner(UserFavoritePartner $userFavoritePartner): static
    {
        if ($this->userFavoritePartners->removeElement($userFavoritePartner)) {
            if ($userFavoritePartner->getUser() === $this) { // ✅ getUser
                $userFavoritePartner->setUser(null);
            }
        }
        return $this;
    }

    // --- Reservations ---
    public function getReservations(): Collection { return $this->reservations; }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setUser($this); // ✅ setUser
        }
        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            if ($reservation->getUser() === $this) { // ✅ getUser
                $reservation->setUser(null);
            }
        }
        return $this;
    }
}