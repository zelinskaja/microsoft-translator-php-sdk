<?php

namespace Wowmaking\MicrosoftTranslator;

use Guzzle\Http\Client;
use Wowmaking\MicrosoftTranslator\Transformers\{
    BreakSentenceTransformer, DetectedTransformer, LanguagesTransformer, TranslateArrayTransformer, TranslateTransformer
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
     * @param array $texts
     * @return Response
     */
    public function detected(array $texts): Response
    {
        $response = $this->client
            ->post(
                $this->getUrl('detect'),
                $this->getHeaders(),
                json_encode(array_map(function ($text) {
                    return ['text' => $text];
                }, array_values($texts)))
            )
            ->send();

        return new Response($response, new DetectedTransformer());
    }

    /**
     * @param array $texts
     * @return Response
     */
    public function breakSentence(array $texts): Response
    {
        $response = $this->client
            ->post(
                $this->getUrl('breaksentence'),
                $this->getHeaders(),
                json_encode(array_map(function ($text) {
                    return ['text' => $text];
                }, array_values($texts)))
            )
            ->send();

        return new Response($response, new BreakSentenceTransformer());
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

    /**
     * @param array $text
     * @param string $languageCode
     * @param string $fromScript
     * @return array
     */
    public function transliterateArray(array $text, string $languageCode, string $fromScript): array
    {
        $arrayCount = count($text);
        $result = [];
        for ($i = 0; $i < $arrayCount; $i += self::TRANSLITERATE_BATCH_COUNT) {
            $text_slice = array_slice($text, $i, self::TRANSLITERATE_BATCH_COUNT);
            $response = $this->client
                ->post(
                    $this->getUrl('transliterate',
                        ['language' => $languageCode, 'fromScript' => $fromScript, 'toScript' => 'Latn']),
                    $this->getHeaders(),
                    json_encode(array_map(function ($item) {
                        return ['text' => $item];
                    }, array_values($text_slice)))
                )
                ->send();
            $result = array_merge($result, $response->json());
        }

        return $result;
    }

    /**
     * @return array ['ja' => 'Jpan' , ...]
     */
    public function getSupportedLanguagesForTransliteration()
    {
        $response = $this->client->get(
            $this->getUrl('languages',
                ['scope' => 'transliteration']),
            ['Content-Type' => 'application/json']
        )->send();
        $transliteration = $response->json()['transliteration'];
        $code_arr = [];
        foreach ($transliteration as $code => $arr) {
            $fromScript = $transliteration[$code]['scripts'][0]['code'];
            $code_arr[$code] = $fromScript;

        }
        return $code_arr;
    }

}