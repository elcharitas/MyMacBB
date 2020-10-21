<?php
namespace App\Support\Twig\TokenParser;

use Twig\Token;
use App\Support\Twig\Node\ReturnNode;
use Twig\TokenParser\AbstractTokenParser;

class ReturnTokenParser extends AbstractTokenParser
{
    public function parse(Token $token)
    {
        $expr = $this->parser->getExpressionParser()->parseExpression();

        $this->parser->getStream()->expect(/* Token::BLOCK_END_TYPE */ 3);

        return new ReturnNode($expr, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'return';
    }
}