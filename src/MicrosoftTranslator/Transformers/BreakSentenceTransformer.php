<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\{
    BreakSentence\BreakSentence, BreakSentence\BreakSentenceCollection, IEntity, Translation\DetectedLanguage
};

/**
 * Class BreakSentenceTransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
class BreakSentenceTransformer implements ITransformer
{

    /**
     * @param array $data
     * @return BreakSentenceCollection
     */
    public function transform(array $data): IEntity
    {
        $breakSentenceCollection = new BreakSentenceCollection();

        foreach ($data as $item) {
            $breakSentence = new BreakSentence();

            $detectedLanguage = new DetectedLanguage();

            $detectedLanguage
                ->setLanguage($item->detectedLanguage->language)
                ->setScore($item->detectedLanguage->score);

            $breakSentence
                ->setDetectedLanguages($detectedLanguage)
                ->setSentenceLengths($item->sentLen);

            $breakSentenceCollection->addCollection($breakSentence);
        }

        return $breakSentenceCollection;
    }
}