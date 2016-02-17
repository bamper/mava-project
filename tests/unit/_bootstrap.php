<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

// Here you can initialize variables that will be available to your tests
if (!file_exists($file = __DIR__.'/../../vendor/autoload.php')) {
    throw new \RuntimeException('Install the dependencies to run the test suite.');
}
$loader = require $file;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
