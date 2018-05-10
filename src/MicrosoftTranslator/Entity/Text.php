<?php

namespace Wowmaking\MicrosoftTranslator\Entity;

use Wowmaking\MicrosoftTranslator\Traits\ToArrayTrait;

/**
 * Class Text
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class Text implements IEntity
{
    use ToArrayTrait;

    /**
     * @var DetectedLanguage
     */
    protected $detectedLanguage;

    /**
     * @var Translation[]
     */
    protected $translations = [];

    /**
     * @return DetectedLanguage
     */
    public function getDetectedLanguage(): DetectedLanguage
    {
        return $this->detectedLanguage;
    }

    /**
     * @param DetectedLanguage $detectedLanguage
     * @return $this
     */
    public function setDetectedLanguage(DetectedLanguage $detectedLanguage)
    {
        $this->detectedLanguage = $detectedLanguage;

        return $this;
    }

    /**
     * @return Translation[]
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param Translation[] $translations
     * @return $this
     */
    public function setTranslations(array $translations)
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @param Translation $translation
     * @return $this
     */
    public function addTranslation(Translation $translation)
    {
        array_push($this->translations, $translation);

        return $this;
    }

}