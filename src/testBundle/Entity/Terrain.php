<?php

namespace testBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Terrain
 */
class Terrain
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
