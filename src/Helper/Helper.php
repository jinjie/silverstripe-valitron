<?php

/**
 * Helper
 *
 * @package SwiftDevLabs\Valitron
 * @author Kong Jin Jie <jinjie@swiftdev.sg>
 */

namespace SwiftDevLabs\Valitron;

use SilverStripe\ORM\ValidationResult;

class Helper
{
    /**
     * Validates and add errors into fields if there is
     * @param  \Valitron\Validator $v      [description]
     * @param  ValidationResult    $result [description]
     * @return ValidationResult            [description]
     */
    public static function validate(\Valitron\Validator $v, ValidationResult $result)
    {
        if ($v->validate()) {
            return $result;
        }

        // Iterate the errors and add errors accordingly to find.
        foreach ($v->errors() as $field => $errors) {
            foreach ($errors as $error) {
                $result->addFieldError($field, $error);
            }
        }

        return $result;
    }
}
