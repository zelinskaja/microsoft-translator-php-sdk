<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Translation;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class TranslationCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class TranslationCollection implements IEntity
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
     * @return Translation[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param Translation $text
     * @return $this
     */
    public function addCollection(Translation $text)
    {
        array_push($this->collection, $text);

        return $this;
    }
}