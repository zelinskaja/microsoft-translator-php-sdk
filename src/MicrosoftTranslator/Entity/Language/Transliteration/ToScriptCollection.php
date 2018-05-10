<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class ToScriptCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class ToScriptCollection implements IEntity
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
     * @return ToScript[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param ToScript $text
     * @return $this
     */
    public function addCollection(ToScript $text)
    {
        array_push($this->collection, $text);

        return $this;
    }
}