<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Detected;

use Wowmaking\MicrosoftTranslator\{
    Entity\AbstractCollection, Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class DetectedLanguagesCollection
 * @package Wowmaking\MicrosoftTranslator\Entity\Detected
 */
class DetectedLanguagesCollection extends AbstractCollection implements IEntity
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
     * @return DetectedLanguage[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }

    /**
     * @param DetectedLanguage $detectedLanguage
     * @return $this
     */
    public function addCollection(DetectedLanguage $detectedLanguage)
    {
        array_push($this->collection, $detectedLanguage);

        return $this;
    }
}