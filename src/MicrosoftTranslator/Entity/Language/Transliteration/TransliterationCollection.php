<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class TransliterationCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class TransliterationCollection implements IEntity
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
     * @param Transliteration $text
     * @return $this
     */
    public function addCollection(Transliteration $text)
    {
        array_push($this->collection, $text);

        return $this;
    }
}