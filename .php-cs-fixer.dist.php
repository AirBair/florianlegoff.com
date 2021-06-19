<?php

declare(strict_types=1);
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('assets')
    ->exclude('config')
    ->exclude('public')
    ->exclude('var')
    ->exclude('vendor')
    ->exclude('translations');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@DoctrineAnnotation' => true,
        '@PHP80Migration:risky' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'strict_comparison' => true,
    ])
    ->setCacheFile(__DIR__.'/var/.php_cs.cache')
    ->setFinder($finder);
