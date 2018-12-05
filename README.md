# Better Validation for SilverStripe

A very simple validation that make use of Valitron. Provides a helper that add error messages to form fields.

```php
use SilverStripe\ORM\DataObject;
use SwiftDevLabs\Valitron\Helper;

class MyDataObject extends DataObject {
    // Validates DataObject
    public function validate()
    {
        $result = parent::validate();

        $v = new \Valitron\Validator([
            'Field1'    => $this->Field1,
            'Field2'    => $this->Field2,
        ]);

        // Find more rules at https://github.com/vlucas/valitron
        $v->rule('required', [
            'Field1',
            'Feild2',
        ]);

        return Helper::validate($v, $result);
    }
}
```