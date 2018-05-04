<?php

namespace Wowmaking\MicrosoftTranslator\Entity;

/**
 * Class TextCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class TextCollection implements IEntity
{
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
     * @return array
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