# Install
```bash
composer require krzysztofzylka/phar
```

# Methods
## Retrieves a list of files contained in the Phar archive
```php
$phar = new \Krzysztofzylka\Phar\Phar('/path/to/file.tar.gz')
var_dump($phar->getContentList())
```
## Retrieves the content of a file from the Phar archive
```php
$phar = new \Krzysztofzylka\Phar\Phar('/path/to/file.tar.gz')
var_dump($phar->getFileContent('path/to/file/in/phar'))
```