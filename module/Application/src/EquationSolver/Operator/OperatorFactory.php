<?php

namespace Application\EquationSolver\Operator;

use Application\EquationSolver\Exception\UnsupportedOperatorException;

use Application\EquationSolver\Operator\ReflectedOperator;

class OperatorFactory 
{
  public static function factory($exp)
  {
    $op = null;

    if (stripos($exp, ReflectedOperator::PLUS_SYMBOL) !== FALSE) {
      $op = new PlusOperator;
    } elseif (stripos($exp, ReflectedOperator::MINUS_SYMBOL) !== FALSE) {
      $op = new MinusOperator;
    } elseif (stripos($exp, ReflectedOperator::MULTIPLY_SYMBOL) !== FALSE) {
      $op = new MultiplyOperator;
    } elseif (stripos($exp, ReflectedOperator::DEVIDE_SYMBOL) !== FALSE) {
      $op = new DevideOperator;
    } else {
      return new UnsupportedOperatorException('Unsupport operator', 404);
    }
    return $op;
  }
}
