# cloudsearch-query-builder

## Requirements

- PHP: `^7.4 || ^8.0`

## Usage

```php
$parameters = (new Builder)
    ->terms(['one', 'two'], 'foo')
    ->terms(['three', 'four'])
    ->build();
```

```
(and (or (term field=foo 'one') (term field=foo 'two')) (or (term 'three') (term 'four')))
```
