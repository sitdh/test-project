<?php

namespace Application\EquationSolver\Operator;

class OperatorFactory 
{
  public static function factory($exp) : OperatorInterface
  {
    $op = null;

    if (stripos('+', $operator) > 0) {
      $op = new PlusOperator;
    } elseif (stripos('-', $operator) > 0) {
      $op = new MinusOperator;
    } elseif (stripos('x', $operator) > 0) {
      $op = new MultiplyOperator;
    } elseif (stripos('/', $operator) > 0) {
      $op = new DevideOperator;
    } else {
      return new Application\EquationSolver\Exception\UnsupportedOperatorException(
        'Unsupport operator', 404);
    }
    return $op;
  }
}
