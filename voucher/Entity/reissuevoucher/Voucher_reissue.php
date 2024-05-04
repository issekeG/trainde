<?php

namespace App\Entity\reissuevoucher;

use App\Repository\reissuevoucher\VoucherRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=VoucherRepository::class)
 */
class Voucher_reissue
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reason;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $giftCardNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $originalIssuingStore;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfPurchase;

    /**
     * @ORM\Column(type="time",nullable=true)
     */
    private $timeOfPurchase;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valueLoadedOnCard;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $furtherDetails;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $requestedBy;

    /**
     * @ORM\Column(type="date")
     */
    private $requestedDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $authorizedBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sentOutBy;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $authorizedDate;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $newEvoucherReference;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    private $newEvoucherDate =null ;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $cardLinkedTo;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $deliveredTo;

    /**
     * @ORM\Column(type="string", length=255 , options={"default": "Pending"})
     */
    private $status;



    public function __construct()
    {
        $this->status = 'Pending';
        $this->newEvoucherDate = null;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdNumber(): ?string
    {
        return $this->idNumber;
    }

    public function setIdNumber(string $idNumber): self
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    public function getGiftCardNumber(): ?string
    {
        return $this->giftCardNumber;
    }

    public function setGiftCardNumber(string $giftCardNumber): self
    {
        $this->giftCardNumber = $giftCardNumber;

        return $this;
    }

    public function getOriginalIssuingStore(): ?string
    {
        return $this->originalIssuingStore;
    }

    public function setOriginalIssuingStore(string $originalIssuingStore): self
    {
        $this->originalIssuingStore = $originalIssuingStore;

        return $this;
    }

    public function getDateOfPurchase(): ?\DateTimeInterface
    {
        return $this->dateOfPurchase;
    }

    public function setDateOfPurchase(\DateTimeInterface $dateOfPurchase): self
    {
        $this->dateOfPurchase = $dateOfPurchase;

        return $this;
    }

    public function getTimeOfPurchase(): ?\DateTimeInterface
    {
        return $this->timeOfPurchase;
    }

    public function setTimeOfPurchase(\DateTimeInterface $timeOfPurchase): self
    {
        $this->timeOfPurchase = $timeOfPurchase;

        return $this;
    }

    public function getValueLoadedOnCard(): ?string
    {
        return $this->valueLoadedOnCard;
    }

    public function setValueLoadedOnCard(string $valueLoadedOnCard): self
    {
        $this->valueLoadedOnCard = $valueLoadedOnCard;

        return $this;
    }

    public function getFurtherDetails(): ?string
    {
        return $this->furtherDetails;
    }

    public function setFurtherDetails(string $furtherDetails): self
    {
        $this->furtherDetails = $furtherDetails;

        return $this;
    }

    public function getRequestedBy(): ?string
    {
        return $this->requestedBy;
    }

    public function setRequestedBy(string $requestedBy): self
    {
        $this->requestedBy = $requestedBy;

        return $this;
    }

    public function getRequestedBySignature(): ?string
    {
        return $this->requestedBySignature;
    }

    public function setRequestedBySignature(string $requestedBySignature): self
    {
        $this->requestedBySignature = $requestedBySignature;

        return $this;
    }

    public function getRequestedDate(): ?\DateTimeInterface
    {
        return $this->requestedDate;
    }

    public function setRequestedDate(\DateTimeInterface $requestedDate): self
    {
        $this->requestedDate = $requestedDate;

        return $this;
    }

    public function getAuthorizedBy(): ?string
    {
        return $this->authorizedBy;
    }

    public function setAuthorizedBy(?string $authorizedBy): self
    {
        $this->authorizedBy = $authorizedBy;

        return $this;
    }

    public function getSentOutBy(): ?string
    {
        return $this->sentOutBy;
    }

    public function setSentOutBy(?string $sentOutBy): self
    {
        $this->sentOutBy = $sentOutBy;

        return $this;
    }

    public function getAuthorizedDate(): ?\DateTimeInterface
    {
        return $this->authorizedDate;
    }

    public function setAuthorizedDate(?\DateTimeInterface $authorizedDate): self
    {
        $this->authorizedDate = $authorizedDate;

        return $this;
    }

    public function getNewEvoucherReference(): ?string
    {
        return $this->newEvoucherReference;
    }

    public function setNewEvoucherReference(string $newEvoucherReference): self
    {
        $this->newEvoucherReference = $newEvoucherReference;

        return $this;
    }

    public function getNewEvoucherDate(): ?\DateTimeInterface
    {
        return $this->newEvoucherDate;
    }

    public function setNewEvoucherDate(?DateTime $newEvoucherDate = null): self
    {
        $this->newEvoucherDate = $newEvoucherDate;

        return $this;
    }

    public function getCardLinkedTo(): ?string
    {
        return $this->cardLinkedTo;
    }

    public function setCardLinkedTo(string $cardLinkedTo): self
    {
        $this->cardLinkedTo = $cardLinkedTo;

        return $this;
    }

    public function getDeliveredTo(): ?string
    {
        return $this->deliveredTo;
    }

    public function setDeliveredTo(string $deliveredTo): self
    {
        $this->deliveredTo = $deliveredTo;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}

