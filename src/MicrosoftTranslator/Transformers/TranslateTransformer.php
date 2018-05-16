<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\{
    Translation\DetectedLanguage, Translation\Text, Translation\Translation, IEntity
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
         * @var Text $text
         */
        $text = new Text();

        if (isset($array->detectedLanguage)) {
            /**
             * @var DetectedLanguage $detectedLanguage
             */
            $detectedLanguage = new DetectedLanguage();
            $detectedLanguage
                ->setLanguage($array->detectedLanguage->language)
                ->setScore($array->detectedLanguage->score);

            $text
                ->setDetectedLanguage($detectedLanguage);
        }

        /**
         * @var Translation $translation
         */
        $translation = new Translation();
        $translation
            ->setSource($this->text)
            ->setFrom((string)$this->from)
            ->setDetectedFrom($array->detectedLanguage->language ?? '')
            ->setTo($array->translations[0]->to)
            ->setText($array->translations[0]->text);

        $text->addTranslation($translation);

        return $text;
    }
}