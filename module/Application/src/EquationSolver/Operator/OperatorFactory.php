<?php

namespace Application\EquationSolver\Operator;

class OperatorFactory 
{
  public function factory($operator)
  {
    $op = null;

    if (0 == strcmp('+', $operator)) {
      $op = new PlusOperator;
    } elseif (0 == strcmp('-', $operator)) {
      $op = new MinusOperator;
    } elseif (0 == strcmp('x', $operator)) {
      $op = new MultiplyOperator;
    } elseif (0 == strcmp('/', $operator)) {
      $op = new DevideOperator;
    } else {
      return new Application\EquationSolver\Exception\UnsupportedOperatorException(
        'Unsupport operator', 404);
    }

    return $op;
  }
}
