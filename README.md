# simpleillegalwordsfilter
A simple illegal words filter

## useage

```php

$wordsAdapter = new \SIWF\Words\ArrayWordsAdapter(['simple','illegal']);
$builder = new \SIWF\Tree\Builder($wordsAdapter);
$storage = new \SIWF\Storage\NativeStorageAdapter($builder);
$filter = new \SIWF\Filter\Filter($storage);

$txt = 'A very simple illegal words filter';
$hint = $filter->hint($txt);
echo $hint;
//this will output 'simple';
```
