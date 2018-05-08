<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Dictionary;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class Dictionary
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class Dictionary implements IEntity
{
    use ToArrayTrait;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $nativeName;

    /**
     * @var string
     */
    protected $dir;

    /**
     * @var TranslationCollection
     */
    protected $translations;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getNativeName(): string
    {
        return $this->nativeName;
    }

    /**
     * @param string $nativeName
     * @return $this
     */
    public function setNativeName(string $nativeName)
    {
        $this->nativeName = $nativeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     * @return $this
     */
    public function setDir(string $dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * @return TranslationCollection
     */
    public function getTranslations(): TranslationCollection
    {
        return $this->translations;
    }

    /**
     * @param TranslationCollection $translations
     * @return $this
     */
    public function setTranslations(TranslationCollection $translations)
    {
        $this->translations = $translations;

        return $this;
    }
}