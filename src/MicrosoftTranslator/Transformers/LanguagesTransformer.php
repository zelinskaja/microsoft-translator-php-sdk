<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\{
    IEntity,
    Language\Translation\TranslationCollection
};
use Wowmaking\MicrosoftTranslator\Entity\Language;

/**
 * Class LanguagesTransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
class LanguagesTransformer implements ITransformer
{

    /**
     * @param array $data
     * @return Language\LanguageCollection
     */
    public function transform(array $data): IEntity
    {
        $translationCollection = $this->transformTranslation((array)$data['translation']);

        $transliterationCollection = $this->transformTransliteration((array)$data['transliteration']);

        $dictionaryCollection = $this->transformDictionary((array)$data['dictionary']);

        $languageCollection = new Language\LanguageCollection();

        $languageCollection
            ->setTranslation($translationCollection)
            ->setTransliteration($transliterationCollection)
            ->setDictionary($dictionaryCollection);

        return $languageCollection;
    }

    /**
     * @param array $data
     * @return TranslationCollection
     */
    public function transformTranslation(array $data): TranslationCollection
    {
        $translationCollection = new TranslationCollection();

        foreach ($data as $key => $value) {
            $translation = new Language\Translation\Translation();

            $translation
                ->setCode($key)
                ->setName($value->name)
                ->setNativeName($value->nativeName)
                ->setDir($value->dir);

            $translationCollection->addCollection($translation);
        }

        return $translationCollection;
    }

    /**
     * @param array $data
     * @return Language\Transliteration\TransliterationCollection
     */
    public function transformTransliteration(array $data): Language\Transliteration\TransliterationCollection
    {
        $transliterationCollection = new Language\Transliteration\TransliterationCollection();

        foreach ($data as $key => $value) {
            $transliteration = new Language\Transliteration\Transliteration();

            $transliteration
                ->setCode($key)
                ->setName($value->name)
                ->setNativeName($value->nativeName);

            $scriptCollection = new Language\Transliteration\ScriptCollection();

            foreach ($value->scripts as $scriptValue) {
                $script = new Language\Transliteration\Script();

                $script
                    ->setCode($scriptValue->code)
                    ->setName($scriptValue->name)
                    ->setNativeName($scriptValue->nativeName)
                    ->setDir($scriptValue->dir);

                $toScriptCollection = new Language\Transliteration\ToScriptCollection();

                foreach ($scriptValue->toScripts as $toScriptValue) {
                    $toScript = new Language\Transliteration\ToScript();

                    $toScript
                        ->setCode($toScriptValue->code)
                        ->setName($toScriptValue->name)
                        ->setNativeName($toScriptValue->nativeName)
                        ->setDir($toScriptValue->dir);

                    $toScriptCollection->addCollection($toScript);
                }

                $scriptCollection->addCollection($script);
            }

            $transliteration->setScripts($scriptCollection);

            $transliterationCollection->addCollection($transliteration);
        }

        return $transliterationCollection;
    }

    /**
     * @param array $data
     * @return Language\Dictionary\DictionaryCollection
     */
    public function transformDictionary(array $data): Language\Dictionary\DictionaryCollection
    {
        $dictionaryCollection = new Language\Dictionary\DictionaryCollection;

        foreach ($data as $key => $value) {
            $dictionary = new Language\Dictionary\Dictionary();

            $dictionary
                ->setCode($key)
                ->setName($value->name)
                ->setNativeName($value->nativeName)
                ->setDir($value->dir);

            $translationCollection = new Language\Dictionary\TranslationCollection();

            foreach ($value->translations as $translationsValue) {
                $translation = new Language\Dictionary\Translation();

                $translation
                    ->setCode($translationsValue->code)
                    ->setCode($translationsValue->name)
                    ->setCode($translationsValue->nativeName)
                    ->setCode($translationsValue->dir);

                $translationCollection->addCollection($translation);
            }

            $dictionary->setTranslations($translationCollection);

            $dictionaryCollection->addCollection($dictionary);
        }

        return $dictionaryCollection;
    }
}