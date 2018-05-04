<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\{
    DetectedLanguage, IEntity, Text, TextCollection, Translation
};

/**
 * Class TranslateArrayTransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
class TranslateArrayTransformer implements ITransformer
{
    /**
     * @param array $data
     * @return Text
     */
    public function transform(array $data): IEntity
    {
        /**
         * @var TextCollection $textCollection
         */
        $textCollection = new TextCollection();

        foreach ($data as $item) {

            /**
             * @var DetectedLanguage $detectedLanguage
             */
            $detectedLanguage = new DetectedLanguage();
            $detectedLanguage
                ->setLanguage($item->detectedLanguage->language)
                ->setScore($item->detectedLanguage->score);

            /**
             * @var Text $text
             */
            $text = new Text();
            $text->setDetectedLanguage($detectedLanguage);

            foreach ($item->translations as $itemTranslation) {
                /**
                 * @var Translation $translation
                 */
                $translation = new Translation();
                $translation
                    ->setTo($itemTranslation->to)
                    ->setText($itemTranslation->text);

                $text->addTranslation($translation);
            }

            $textCollection->addCollection($text);
        }

        return $textCollection;
    }
}