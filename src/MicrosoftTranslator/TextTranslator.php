<?php

namespace Wowmaking\MicrosoftTranslator;

use Guzzle\Http\Client;
use Wowmaking\MicrosoftTranslator\Transformers\LanguagesTransformer;
use Wowmaking\MicrosoftTranslator\Transformers\TranslateArrayTransformer;
use Wowmaking\MicrosoftTranslator\Transformers\TranslateTransformer;

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
     * TextTranslator constructor.
     * @param string $key
     * @param string $baseUrl
     * @param null $config
     */
    public function __construct(string $key, $baseUrl = '', $config = null)
    {
        $this->client = new Client($baseUrl, $config);
        $this->key = $key;
    }

    /**
     * @param string $text
     * @param string $to
     * @param string $from
     * @return Response
     */
    public function translate(string $text, string $to, string $from = null): Response
    {
        $response = $this->client
            ->post(
                $this->getUrl('translate', compact('to', 'from')),
                $this->getHeaders(),
                json_encode([compact('text')])
            )
            ->send();

        return new Response($response, new TranslateTransformer($text, $from));
    }

    /**
     * @param array $text
     * @param array $to
     * @param string $from
     * @return Response
     */
    public function translateArray(array $text, array $to, string $from = null): Response
    {
        $response = $this->client
            ->post(
                $this->getUrl('translate', ['to' => array_values($to), 'from' => $from]),
                $this->getHeaders(),
                json_encode(array_map(function ($item) {
                    return ['text' => $item];
                }, array_values($text)))
            )
            ->send();

        return new Response($response, new TranslateArrayTransformer(array_values($text), $from));
    }

    /**
     * @return Response
     */
    public function getLanguages(): Response
    {
        $response = $this->client
            ->get($this->getUrl('languages'))
            ->send();

        return new Response($response, new LanguagesTransformer());
    }

    /**
     * @param string $location
     * @param array $params
     * @return string
     */
    protected function getUrl(string $location, array $params = []): string
    {
        return self::URL . $location . '?' . http_build_query(array_merge(['api-version' => self::VERSION], $params));
    }

    /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return [
            'Ocp-Apim-Subscription-Key' => $this->key,
            'Content-Type' => 'application/json',
        ];
    }
}