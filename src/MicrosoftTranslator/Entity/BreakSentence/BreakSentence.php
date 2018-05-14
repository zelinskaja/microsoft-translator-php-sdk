<?php

namespace Wowmaking\MicrosoftTranslator\Entity\BreakSentence;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Entity\Translation\DetectedLanguage, Traits\ToArrayTrait
};

/**
 * Class BreakSentence
 * @package Wowmaking\MicrosoftTranslator\Entity\Detected
 */
class BreakSentence implements IEntity
{
    use ToArrayTrait;

    /**
     * @var DetectedLanguage
     */
    protected $detectedLanguage;

    /**
     * @var int[]
     */
    protected $sentenceLengths;

    /**
     * @return DetectedLanguage
     */
    public function getDetectedLanguages(): DetectedLanguage
    {
        return $this->detectedLanguage;
    }

    /**
     * @param DetectedLanguage $detectedLanguage
     * @return $this
     */
    public function setDetectedLanguages(DetectedLanguage $detectedLanguage)
    {
        $this->detectedLanguage = $detectedLanguage;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getSentenceLengths(): array
    {
        return $this->sentenceLengths;
    }

    /**
     * @param int[] $sentenceLengths
     * @return $this
     */
    public function setSentenceLengths(array $sentenceLengths)
    {
        $this->sentenceLengths = $sentenceLengths;

        return $this;
    }

    /**
     * @param int $int
     * @return $this
     */
    public function addSentenceLengths(int $int)
    {
        $this->sentenceLengths[] = $int;

        return $this;
    }
}