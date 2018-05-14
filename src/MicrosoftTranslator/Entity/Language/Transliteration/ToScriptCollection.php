<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class ToScriptCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration
 */
class ToScriptCollection extends AbstractCollection implements IEntity
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
     * @param ToScript $toScript
     * @return $this
     */
    public function addCollection(ToScript $toScript)
    {
        array_push($this->collection, $toScript);

        return $this;
    }
}