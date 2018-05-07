<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\{
    DetectedLanguage, IEntity, Text, Translation
};

/**
 * Class TranslateTransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
class TranslateTransformer implements ITransformer
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string|null
     */
    protected $from;

    /**
     * TranslateTransformer constructor.
     *
     * @param string $text
     * @param string|null $from
     */
    public function __construct(string $text, string $from = null)
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
        $array = array_pop($data);

        /**
         * @var DetectedLanguage $detectedLanguage
         */
        $detectedLanguage = new DetectedLanguage();
        $detectedLanguage
            ->setLanguage($array->detectedLanguage->language)
            ->setScore($array->detectedLanguage->score);

        /**
         * @var Translation $translation
         */
        $translation = new Translation();
        $translation
            ->setSource($this->text)
            ->setFrom((string)$this->from)
            ->setTo($array->translations[0]->to)
            ->setText($array->translations[0]->text);

        /**
         * @var Text $text
         */
        $text = new Text();
        $text
            ->setDetectedLanguage($detectedLanguage)
            ->addTranslation($translation);

        return $text;
    }
}