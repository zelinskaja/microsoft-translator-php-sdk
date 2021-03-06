<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Dictionary;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class DictionaryCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Language\Dictionary
 */
class DictionaryCollection extends AbstractCollection implements IEntity
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
     * @param Dictionary $dictionary
     * @return $this
     */
    public function addCollection(Dictionary $dictionary)
    {
        array_push($this->collection, $dictionary);

        return $this;
    }
}