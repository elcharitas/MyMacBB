<?php
namespace App\Support\Twig\Node;

use Twig\Compiler;
use Twig\Node\Node;
use Twig\Node\Expression\AbstractExpression;

class ReturnNode extends Node
{
    public function __construct(AbstractExpression $value, $line, $tag = null)
    {
        parent::__construct(['value' => $value], [], $line, $tag);
    }

    public function compile(Compiler $compiler)
    {
        $value = $this->getNode('value');
        
        $compiler
            ->addDebugInfo($this)
            ->write('echo ')
            ->subcompile($value)
            ->write(';return ')
            ->subcompile($value)
            ->raw(";\n")
        ;
    }
}