<?php

namespace Wowmaking\MicrosoftTranslator\Traits;

use Wowmaking\MicrosoftTranslator\Entity\IEntity;

trait ToArrayTrait
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach (get_class_vars(self::class) as $varName => $varValue) {
            $var = $this->{$varName};

            if ($var instanceof IEntity) {
                $var = $var->toArray();
            }

            if (is_array($var)) {
                $arrayOfObjects = [];

                foreach ($var as $object) {
                    if ($object instanceof IEntity) {
                        array_push($arrayOfObjects, $object->toArray());
                    }
                }

                $var = $arrayOfObjects;
            }

            $array[$varName] = $var;
        }

        return $array;
    }
}
