<?php

namespace Wowmaking\MicrosoftTranslator\Entity;

/**
 * Class Translation
 * @package Wowmaking\MicrosoftTranslator\Entity
 */
class Translation implements IEntity
{
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
        $this->to = $to;

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
        $this->from = $from;

        return $this;
    }
}