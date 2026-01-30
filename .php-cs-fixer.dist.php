<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->exclude([
        'config',
        'docker',
        'public',
        'var',
        'vendor',
        'report'
    ])
    ->notPath('RiotApiDataDragonBundle.php');

$config = new PhpCsFixer\Config();
return $config
    ->setRiskyAllowed(true)
    ->setRules  ([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PSR2' => true,
        '@PSR12' => true,
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder);
