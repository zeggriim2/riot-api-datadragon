<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer'                           => true,
        '@PhpCsFixer:risky'                     => true,
        '@PSR2'                                 => true,
        '@PSR12'                                => true,
        'array_syntax'                          => ['syntax' => 'short'],
        'binary_operator_spaces'                => ['default' => 'align_single_space_minimal'],
        'concat_space'                          => ['spacing' => 'one' ],
        'declare_strict_types'                  => true,
        'linebreak_after_opening_tag'           => true,
        'mb_str_functions'                      => true,
        'no_php4_constructor'                   => true,
        'no_useless_else'                       => true,
        'no_useless_return'                     => true,
        'no_useless_sprintf'                    => true,
        'ordered_imports'                       => true,
        'phpdoc_order'                          => false,
        'return_type_declaration'               => true,
        'semicolon_after_instruction'           => true,
        'strict_comparison'                     => true,
        'strict_param'                          => true,
        'single_quote'                          => false,
        'void_return'                           => true,
    ])
    ->setFinder($finder)
;
