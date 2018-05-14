<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Translation;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class TranslationCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Language\Translation
 */
class TranslationCollection extends AbstractCollection implements IEntity
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
     * @param Translation $translation
     * @return $this
     */
    public function addCollection(Translation $translation)
    {
        array_push($this->collection, $translation);

        return $this;
    }
}