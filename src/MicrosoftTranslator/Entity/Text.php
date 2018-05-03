<?php

namespace Wowmaking\MicrosoftTranslator\Entity;

class Text
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
     * @var DetectedLanguage
     */
    protected $detectedLanguage;

    /**
     * @return string
     */
    public function getText()
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
    public function getTo()
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
    public function getFrom()
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


    /**
     * @return DetectedLanguage
     */
    public function getDetectedLanguage(): DetectedLanguage
    {
        return $this->detectedLanguage;
    }

    /**
     * @param DetectedLanguage $detectedLanguage
     * @return $this
     */
    public function setDetectedLanguage(DetectedLanguage $detectedLanguage)
    {
        $this->detectedLanguage = $detectedLanguage;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->text;
    }
}