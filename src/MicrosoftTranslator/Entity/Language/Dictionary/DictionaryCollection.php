<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Dictionary;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class DictionaryCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class DictionaryCollection implements IEntity
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
     * @return Dictionary[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param Dictionary $text
     * @return $this
     */
    public function addCollection(Dictionary $text)
    {
        array_push($this->collection, $text);

        return $this;
    }
}