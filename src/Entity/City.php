<?php

namespace App\Entity;

class City implements IAPIEntity
{
    private $id;
    private $name;
    private $county;
    private $address;
    private $phone;
    private $email;
    private $password;
    private $concessions;
    private $createdAt;
    private $modifiedAt;
    private $connectedAt;
    private $notification;
    private $hidden;
    private $canBloom;
    private $canMaintain;
    private $hideEndClaim;
    private $zipCode;

    public function toAPI () : array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'county' => $this->county,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'concessions' => $this->concessions,
        ];
    }

    /**
     * Get the value of id
     * 
     * @return \int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param \int $id
     * @return  self
     */ 
    public function setId($id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     * 
     * @return \string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param \string $name
     * @return  self
     */ 
    public function setName($name) : self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of county
     */ 
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set the value of county
     *
     * @return  self
     */ 
    public function setCounty($county) : self
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address) : self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone) : self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email) : self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password) : self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of concessions
     */ 
    public function getConcessions()
    {
        return $this->concessions;
    }

    /**
     * Set the value of concessions
     *
     * @return  self
     */ 
    public function setConcessions($concessions) : self
    {
        $this->concessions = $concessions;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt) : self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of connectedAt
     */ 
    public function getConnectedAt()
    {
        return $this->connectedAt;
    }

    /**
     * Set the value of connectedAt
     *
     * @return  self
     */ 
    public function setConnectedAt($connectedAt) : self
    {
        $this->connectedAt = $connectedAt;

        return $this;
    }

    /**
     * Get the value of notification
     */ 
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set the value of notification
     *
     * @return  self
     */ 
    public function setNotification($notification) : self
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get the value of hidden
     */ 
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set the value of hidden
     *
     * @return  self
     */ 
    public function setHidden($hidden) : self
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get the value of canBloom
     */ 
    public function getCanBloom()
    {
        return $this->canBloom;
    }

    /**
     * Set the value of canBloom
     *
     * @return  self
     */ 
    public function setCanBloom($canBloom): self
    {
        $this->canBloom = $canBloom;

        return $this;
    }

    /**
     * Get the value of canMaintain
     */ 
    public function getCanMaintain()
    {
        return $this->canMaintain;
    }

    /**
     * Set the value of canMaintain
     *
     * @return  self
     */ 
    public function setCanMaintain($canMaintain) : self
    {
        $this->canMaintain = $canMaintain;

        return $this;
    }

    /**
     * Get the value of hideEndClaim
     */ 
    public function getHideEndClaim()
    {
        return $this->hideEndClaim;
    }

    /**
     * Set the value of hideEndClaim
     *
     * @return  self
     */ 
    public function setHideEndClaim($hideEndClaim) : self
    {
        $this->hideEndClaim = $hideEndClaim;

        return $this;
    }

    /**
     * Get the value of zipCode
     */ 
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @return  self
     */ 
    public function setZipCode($zipCode) : self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get the value of modifiedAt
     */ 
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set the value of modifiedAt
     *
     * @return  self
     */ 
    public function setModifiedAt($modifiedAt) : self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }
}