<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Misd\PhoneNumberBundle\Validator\Constraints as AssertPhoneNumber;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Payment
 */
class Payment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cardNumber;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $cvv2;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     * @return Payment
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string 
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Payment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cvv2
     *
     * @param string $cvv2
     * @return Payment
     */
    public function setCvv2($cvv2)
    {
        $this->cvv2 = $cvv2;

        return $this;
    }

    /**
     * Get cvv2
     *
     * @return string 
     */
    public function getCvv2()
    {
        return $this->cvv2;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Payment
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Payment
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('cardNumber', new Assert\NotBlank());
        $metadata->addPropertyConstraint('cardNumber', new Assert\Luhn(array(
            'message' => 'Please check your credit card number',
        )));
        $metadata->addPropertyConstraint('date', new Assert\DateTime());
        $metadata->addPropertyConstraint('cvv2', new Assert\NotBlank());
        $metadata->addPropertyConstraint('cvv2', new Assert\Length(array('min' => 3, 'max' => 4)));

        $metadata->addPropertyConstraint('email', new Assert\NotBlank());
        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'The email "{{ value }}" is not a valid email.',
            'checkMX' => true,
        )));
        $metadata->addPropertyConstraint('phone', new AssertPhoneNumber\PhoneNumber());

    }
}
