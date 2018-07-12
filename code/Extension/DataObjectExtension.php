<?php

class DataObjectExtension extends DataExtension
{
    public function validate(ValidationResult $result)
    {
        if (! method_exists($this->owner, 'getValitron'))
        {
            return $result;
        }

        $v = $this->owner->getValitron();

        if (! is_object($v) OR get_class($v) !== Valitron\Validator::class)
        {
            throw new \Exception('DataObject getValidator() must return Valitron\\Validator object');
        }

        if ($v->validate())
        {
            // Passed validation.
            return $result;
        }

        // Iterate the errors and add errors accordingly to find.
        foreach ($v->errors() as $field => $errors)
        {
            foreach ($errors as $error)
            {
                $result->error("{$error}");
            }
        }

        return $result;
    }
}