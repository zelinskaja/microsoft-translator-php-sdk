<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Traits\ToArrayTrait
};

/**
 * Class Transliteration
 * @package Wowmaking\MicrosoftTranslator\Entity\Language\Transliteration
 */
class Transliteration implements IEntity
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
     * @var ScriptCollection
     */
    protected $scripts;

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
     * @return ScriptCollection
     */
    public function getScripts(): ScriptCollection
    {
        return $this->scripts;
    }

    /**
     * @param ScriptCollection $scripts
     * @return $this
     */
    public function setScripts(ScriptCollection $scripts)
    {
        $this->scripts = $scripts;

        return $this;
    }
}