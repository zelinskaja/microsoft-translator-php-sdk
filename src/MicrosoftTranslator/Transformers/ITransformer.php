<?php

namespace Wowmaking\MicrosoftTranslator\Transformers;

use Wowmaking\MicrosoftTranslator\Entity\IEntity;

/**
 * Interface ITransformer
 * @package Wowmaking\MicrosoftTranslator\Transformers
 */
interface ITransformer
{
    /**
     * @param array $data
     * @return IEntity
     */
    public function transform(array $data): IEntity;
}