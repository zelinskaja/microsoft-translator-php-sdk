<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Detected;

/**
 * Class DetectedLanguage
 * @package Wowmaking\MicrosoftTranslator\Entity\Detected
 */
class DetectedLanguage extends AlternativeLanguage
{
    /**
     * @var AlternativeLanguage[]
     */
    protected $alternatives;

    /**
     * @return AlternativeLanguage[]
     */
    public function getAlternatives(): array
    {
        return $this->alternatives;
    }

    /**
     * @param AlternativeLanguage[] $alternatives
     * @return $this
     */
    public function setAlternatives(array $alternatives)
    {
        $this->alternatives = $alternatives;

        return $this;
    }

    /**
     * @param AlternativeLanguage $alternativeLanguage
     * @return $this
     */
    public function addAlternatives(AlternativeLanguage $alternativeLanguage)
    {
        $this->alternatives[] = $alternativeLanguage;

        return $this;
    }
}