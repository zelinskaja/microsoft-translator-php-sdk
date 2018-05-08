<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class ScriptCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class ScriptCollection implements IEntity
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
     * @return v[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param Script $text
     * @return $this
     */
    public function addCollection(Script $text)
    {
        array_push($this->collection, $text);

        return $this;
    }
}