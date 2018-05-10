<?php

namespace Wowmaking\MicrosoftTranslator\Entity;

use Wowmaking\MicrosoftTranslator\Traits\ToArrayTrait;

/**
 * Class TextCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class TextCollection implements IEntity
{
    use ToArrayTrait;

    /**
     * @var array
     */
    protected $collection = [];

    /**
     * @param array $collection
     * @return $this
     */
    public function setCollection(array $collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Text[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param Text $text
     * @return $this
     */
    public function addCollection(Text $text)
    {
        array_push($this->collection, $text);

        return $this;
    }
}