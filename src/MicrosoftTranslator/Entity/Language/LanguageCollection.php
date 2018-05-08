<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Language;

use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity,
    Entity\Language\Dictionary\DictionaryCollection,
    Entity\Language\Transliteration\TransliterationCollection,
    Entity\Language\Translation\TranslationCollection,
    Traits\ToArrayTrait
};

/**
 * Class LanguageCollection
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class LanguageCollection implements IEntity
{
    use ToArrayTrait;

    /**
     * @var TranslationCollection
     */
    protected $translation;

    /**
     * @var TransliterationCollection
     */
    protected $transliteration;

    /**
     * @var DictionaryCollection
     */
    protected $dictionary;

    /**
     * @return TranslationCollection
     */
    public function getTranslation(): TranslationCollection
    {
        return $this->translation;
    }

    /**
     * @param TranslationCollection $translation
     * @return $this
     */
    public function setTranslation(TranslationCollection $translation)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * @return TransliterationCollection
     */
    public function getTransliteration(): TransliterationCollection
    {
        return $this->transliteration;
    }

    /**
     * @param TransliterationCollection $transliteration
     * @return $this
     */
    public function setTransliteration(TransliterationCollection $transliteration)
    {
        $this->transliteration = $transliteration;

        return $this;
    }

    /**
     * @return DictionaryCollection
     */
    public function getDictionary(): DictionaryCollection
    {
        return $this->dictionary;
    }

    /**
     * @param DictionaryCollection $dictionary
     * @return $this
     */
    public function setDictionary(DictionaryCollection $dictionary)
    {
        $this->dictionary = $dictionary;

        return $this;
    }
}