<?php

declare(strict_types=1);

namespace Doctrine\ORM\Query\AST;

use Doctrine\ORM\Query\SqlWalker;

/**
 * WhenClause ::= "WHEN" ConditionalExpression "THEN" ScalarExpression
 *
 * @link    www.doctrine-project.org
 */
class WhenClause extends Node
{
    /** @var ConditionalExpression */
    public $caseConditionExpression = null;

    /** @var mixed */
    public $thenScalarExpression = null;

    /**
     * @param ConditionalExpression $caseConditionExpression
     * @param mixed                 $thenScalarExpression
     */
    public function __construct($caseConditionExpression, $thenScalarExpression)
    {
        $this->caseConditionExpression = $caseConditionExpression;
        $this->thenScalarExpression    = $thenScalarExpression;
    }

    public function dispatch(SqlWalker $walker): string
    {
        return $walker->walkWhenClauseExpression($this);
    }
}
