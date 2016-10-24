<?php

namespace testBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test_symfony
 */
class test_symfony
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $patate;

    /**
     * @var string
     */
    private $fruits;


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
     * Set patate
     *
     * @param string $patate
     * @return test_symfony
     */
    public function setPatate($patate)
    {
        $this->patate = $patate;

        return $this;
    }

    /**
     * Get patate
     *
     * @return string 
     */
    public function getPatate()
    {
        return $this->patate;
    }

    /**
     * Set fruits
     *
     * @param string $fruits
     * @return test_symfony
     */
    public function setFruits($fruits)
    {
        $this->fruits = $fruits;

        return $this;
    }

    /**
     * Get fruits
     *
     * @return string 
     */
    public function getFruits()
    {
        return $this->fruits;
    }
}
