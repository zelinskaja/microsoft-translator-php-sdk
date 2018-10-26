<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Detected;

use Wowmaking\MicrosoftTranslator\{
    Entity\Translation\DetectedLanguage, Traits\ToArrayTrait
};

/**
 * Class AlternativeLanguage
 * @package Wowmaking\MicrosoftTranslator\Entity\Detected
 */
class AlternativeLanguage extends DetectedLanguage
{
    use ToArrayTrait;

    /**
     * @var bool
     */
    protected $isTranslationSupported;

    /**
     * @var bool
     */
    protected $isTransliterationSupported;

    /**
     * @return bool
     */
    public function isTranslationSupported(): bool
    {
        return $this->isTranslationSupported;
    }

    /**
     * @param bool $isTranslationSupported
     * @return $this
     */
    public function setIsTranslationSupported(bool $isTranslationSupported)
    {
        $this->isTranslationSupported = $isTranslationSupported;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTransliterationSupported(): bool
    {
        return $this->isTransliterationSupported;
    }

    /**
     * @param bool $isTransliterationSupported
     * @return $this
     */
    public function setIsTransliterationSupported(bool $isTransliterationSupported)
    {
        $this->isTransliterationSupported = $isTransliterationSupported;

        return $this;
    }
}