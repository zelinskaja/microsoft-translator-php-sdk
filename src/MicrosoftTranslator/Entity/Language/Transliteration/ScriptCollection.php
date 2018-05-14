<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class ScriptCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration
 */
class ScriptCollection extends AbstractCollection implements IEntity
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
     * @param Script $script
     * @return $this
     */
    public function addCollection(Script $script)
    {
        array_push($this->collection, $script);

        return $this;
    }
}