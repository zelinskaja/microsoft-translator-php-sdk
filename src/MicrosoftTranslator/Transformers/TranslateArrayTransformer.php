<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\IEntity;
use Wowmaking\MicrosoftTranslator\Entity\Translation\{
    DetectedLanguage, Text, TextCollection, Translation
};

/**
 * Class TranslateArrayTransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
class TranslateArrayTransformer implements ITransformer
{
    /**
     * @var array
     */
    protected $text = [];

    /**
     * @var string|null
     */
    protected $from = [];

    /**
     * TranslateArrayTransformer constructor.
     *
     * @param array $text
     * @param string|null $from
     */
    public function __construct(array $text, string $from = null)
    {
        $this->text = $text;
        $this->from = $from;
    }

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

        foreach ($data as $key => $item) {

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

            foreach ($item->translations as $itemKey => $itemTranslation) {
                /**
                 * @var Translation $translation
                 */
                $translation = new Translation();
                $translation
                    ->setSource($this->text[$key])
                    ->setFrom((string)$this->from)
                    ->setDetectedFrom($item->detectedLanguage->language)
                    ->setTo($itemTranslation->to)
                    ->setText($itemTranslation->text);

                $text->addTranslation($translation);
            }

            $textCollection->addCollection($text);
        }

        return $textCollection;
    }
}