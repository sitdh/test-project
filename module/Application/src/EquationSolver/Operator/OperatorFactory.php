<?php

namespace Application\EquationSolver\Operator;

use Application\EquationSolver\Exception\UnsupportedOperatorException;
class OperatorFactory 
{
  public static function factory($exp)
  {
    $op = null;

    if (stripos($exp, '+') !== FALSE) {
      $op = new PlusOperator;
    } elseif (stripos($exp, '-') !== FALSE) {
      $op = new MinusOperator;
    } elseif (stripos($exp, 'x') !== FALSE) {
      $op = new MultiplyOperator;
    } elseif (stripos($exp, '/') !== FALSE) {
      $op = new DevideOperator;
    } else {
      return new UnsupportedOperatorException('Unsupport operator', 404);
    }
    return $op;
  }
}
