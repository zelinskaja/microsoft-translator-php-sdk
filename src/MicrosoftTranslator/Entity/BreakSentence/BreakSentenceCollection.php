<?php

namespace Wowmaking\MicrosoftTranslator\Entity\BreakSentence;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class BreakSentenceCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Detected
 */
class BreakSentenceCollection extends AbstractCollection implements IEntity
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
     * @return BreakSentence[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param BreakSentence $breakSentence
     * @return $this
     */
    public function addCollection(BreakSentence $breakSentence)
    {
        array_push($this->collection, $breakSentence);

        return $this;
    }
}