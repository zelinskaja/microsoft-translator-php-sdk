<?php

namespace Wowmaking\MicrosoftTranslator\Entity\Translation;
use ArrayAccess;
use Wowmaking\MicrosoftTranslator\Entity\IEntity;
use Wowmaking\MicrosoftTranslator\Traits\ArrayAccessForEntity;
use Wowmaking\MicrosoftTranslator\Traits\ToArrayTrait;

/**
 * Class Translation
 * @package Wowmaking\MicrosoftTranslator\Entity\Translation
 */
class Translation implements IEntity, ArrayAccess
{
    use ArrayAccessForEntity, ToArrayTrait;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $detectedFrom;

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return $this
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return $this
     */
    public function setTo(string $to)
    {
        $this->to = strtoupper($to);

        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return $this
     */
    public function setFrom(string $from)
    {
        $this->from = strtoupper($from);

        return $this;
    }

    /**
     * @return string
     */
    public function getDetectedFrom(): string
    {
        return $this->detectedFrom;
    }

    /**
     * @param string $detectedFrom
     * @return mixed
     */
    public function setDetectedFrom(string $detectedFrom)
    {
        $this->detectedFrom = strtoupper($detectedFrom);

        return $this;
    }
}