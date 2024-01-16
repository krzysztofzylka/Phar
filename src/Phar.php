<?php

namespace Krzysztofzylka\Phar;

use PharData;

class Phar
{

    /**
     * Phar data instance
     * @var PharData
     */
    public PharData $pharData;

    /**
     * File path
     * @var string
     */
    protected string $path;

    /**
     * Initializes a new instance of the class
     * @param string $path The path to the Phar archive.
     * @return void
     */
    public function __construct(string $path)
    {
        $this->path = $path;
        $this->pharData = new PharData($path);
    }

    /**
     * Retrieves a list of files contained in the Phar archive.
     * @return array An array of file names.
     */
    public function getContentList(): array
    {
        $files = [];

        foreach (new RecursiveIteratorIterator($this->pharData) as $file) {
            $files[] = str_replace("phar://" . $this->path . "/", "", $file);
        }

        return $files;
    }

    /**
     * Retrieves the content of a file from the Phar archive.
     * @param string $name The name of the file to retrieve.
     * @return false|string The content of the file if found, otherwise false.
     */
    public function getFileContent(string $name): false|string
    {
        $file = $this->pharData[$name];

        return file_get_contents($file->getPathName());
    }

}