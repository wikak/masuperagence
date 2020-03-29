<?php
/**
 * Created by PhpStorm.
 * User: scxtz
 * Date: 3/29/20
 * Time: 09:10
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class PropertySearch {
    /**
     * @var int
     */
    private $maxPrice;

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param mixed $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * @param mixed $minSurface
     * @return PropertySearch
     */
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;
        return $this;
    }
    /**
     * @var int
     * @Assert\Range(min=10, max=100)
     */
    private $minSurface;
}