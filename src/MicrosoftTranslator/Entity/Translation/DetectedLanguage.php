<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Translation;

use Wowmaking\MicrosoftTranslator\Entity\IEntity;
use Wowmaking\MicrosoftTranslator\Traits\ToArrayTrait;

/**
 * Class DetectedLanguage
 * @package Wowmaking\MicrosoftTranslator\Entity\Translation
 */
class DetectedLanguage implements IEntity
{
    use ToArrayTrait;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var float
     */
    protected $score;

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language)
    {
        $this->language = mb_strtoupper($language);

        return $this;
    }

    /**
     * @return float
     */
    public function getScore(): float
    {
        return $this->score;
    }

    /**
     * @param float $score
     * @return $this
     */
    public function setScore(float $score)
    {
        $this->score = $score;

        return $this;
    }
}