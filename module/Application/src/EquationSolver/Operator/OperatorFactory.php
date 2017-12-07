<?php

namespace Application\EquationSolver\Operator;

use Application\EquationSolver\Exception\UnsupportedOperatorException;
class OperatorFactory 
{
  public static function factory($exp)
  {
    $op = null;

    if (stripos($exp, '+') >= 0) {
      $op = new PlusOperator;
    } elseif (stripos($exp, '-') >= 0) {
      $op = new MinusOperator;
    } elseif (stripos($exp, 'x') >= 0) {
      $op = new MultiplyOperator;
    } elseif (stripos($exp, '/') >= 0) {
      $op = new DevideOperator;
    } else {
      return new UnsupportedOperatorException('Unsupport operator', 404);
    }
    return $op;
  }
}
