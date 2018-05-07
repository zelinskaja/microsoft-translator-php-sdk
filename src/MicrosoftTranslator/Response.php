<?php

namespace Wowmaking\MicrosoftTranslator;

use Guzzle\Http\Message\Response as GuzzleResponse;
use Wowmaking\MicrosoftTranslator\{
    Entity\IEntity, Transformers\ITransformer
};

/**
 * Class Response
 * @package Wowmaking\MicrosoftTranslator
 */
class Response
{
    /**
     * @var GuzzleResponse
     */
    protected $response;

    /**
     * @var ITransformer
     */
    protected $transformer;

    /**
     * Response constructor.
     *
     * @param GuzzleResponse $response
     * @param ITransformer $transformer
     */
    public function __construct(GuzzleResponse $response, ITransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    /**
     * @param ITransformer $transformer
     * @return $this
     */
    public function setTransformer(ITransformer $transformer)
    {
        $this->transformer = $transformer;

        return $this;
    }

    /**
     * @return GuzzleResponse
     */
    public function response(): GuzzleResponse
    {
        return $this->response;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return json_decode($this->response->getBody(), true);
    }

    /**
     * @return Entity\IEntity
     */
    public function entity(): IEntity
    {
        return $this->transformer->transform(json_decode($this->response->getBody()));
    }

    /**
     * @return string
     */
    public function json(): string
    {
        return $this->response->getBody();
    }
}