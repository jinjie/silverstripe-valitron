# Better Validation for SilverStripe

DataObject validation using vlucas/valitron.

```php
public function getValitron()
{
    $v = new Valitron\Validator([
        'Title' => $this->Title,
    ]);

    $v->rule('required', [
        'Title',
    ]);
    
    return $v;
}
```