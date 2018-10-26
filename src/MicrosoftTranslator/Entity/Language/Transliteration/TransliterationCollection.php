<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class TransliterationCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration
 */
class TransliterationCollection extends AbstractCollection implements IEntity
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
     * @return Transliteration[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param Transliteration $transliteration
     * @return $this
     */
    public function addCollection(Transliteration $transliteration)
    {
        array_push($this->collection, $transliteration);

        return $this;
    }
}