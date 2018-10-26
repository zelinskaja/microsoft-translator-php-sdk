<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\{
    Detected\AlternativeLanguage, Detected\DetectedLanguage, Detected\DetectedLanguagesCollection, IEntity
};

/**
 * Class DetectedTransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
class DetectedTransformer implements ITransformer
{

    /**
     * @param array $data
     * @return DetectedLanguagesCollection
     */
    public function transform(array $data): IEntity
    {
        $detectedLanguagesCollection = new DetectedLanguagesCollection();

        foreach ($data as $lang) {
            $detectedLanguage = new DetectedLanguage();

            $detectedLanguage
                ->setLanguage($lang->language)
                ->setScore($lang->score)
                ->setIsTranslationSupported($lang->isTranslationSupported)
                ->setIsTransliterationSupported($lang->isTransliterationSupported);

            foreach ($lang->alternatives as $alternative) {
                $alternativeLanguage = new AlternativeLanguage();

                $alternativeLanguage
                    ->setLanguage($alternative->language)
                    ->setScore($alternative->score)
                    ->setIsTranslationSupported($alternative->isTranslationSupported)
                    ->setIsTransliterationSupported($alternative->isTransliterationSupported);

                $detectedLanguage->addAlternatives($alternativeLanguage);
            }

            $detectedLanguagesCollection->addCollection($detectedLanguage);
        }

        return $detectedLanguagesCollection;
    }
}