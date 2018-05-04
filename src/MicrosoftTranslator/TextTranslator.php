<?php

namespace Wowmaking\MicrosoftTranslator;

use Guzzle\Http\Client;
use Wowmaking\MicrosoftTranslator\Entity\{
    DetectedLanguage, Text
};

class TextTranslator
{
    const URL = 'https://api.cognitive.microsofttranslator.com/';
    const VERSION = '3.0';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $key;

    /**
     * Translator constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->client = new Client();
        $this->key = $key;
    }

    /**
     * @param string $text
     * @param string $to
     * @param string $from
     * @return Text
     */
    public function translate(string $text, string $to, string $from = '') : Text
    {
        $result = $this->client
            ->post(
                $this->getUrl('translate', ['to' => ['RU', 'DE']]),
                $this->getHeaders(),
                json_encode([['text' => 'hi'], ['text' => 'cat']])
            )
            ->send()
            ->getBody();

        $array = array_pop(json_decode($result));

        $detectedLanguage = new DetectedLanguage();
        $detectedLanguage->setLanguage($array->detectedLanguage->language)
            ->setScore($array->detectedLanguage->score);

        $api = new Text();
        $api->setFrom($from)
            ->setTo($to)
            ->setText($array->translations[0]->text)
            ->setDetectedLanguage($detectedLanguage);

        return $api;
    }

    /**
     * @return array
     */
    public function getLanguages() : array
    {
        $result = $this->client
            ->get($this->getUrl('languages'))
            ->send()
            ->getBody();

        return json_decode($result, true);
    }

    /**
     * @param string $location
     * @param array $params
     * @return string
     */
    protected function getUrl(string $location, array $params = []) : string
    {
        return self::URL . $location . '?' . http_build_query(array_merge(['api-version' => self::VERSION], $params));
    }

    /**
     * @return array
     */
    protected function getHeaders() : array
    {
        return [
            'Ocp-Apim-Subscription-Key' => $this->key,
            'Content-Type' => 'application/json',
        ];
    }
}