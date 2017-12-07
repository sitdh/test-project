<?php

namespace Application\EquationSolver\Operator;

class ReflectedOperator 
{
  const PLUS_SYMBOL     = '+';
  const MINUS_SYMBOL    = '-';
  const MULTIPLY_SYMBOL = 'x';
  const DEVIDE_SYMBOL   = '/';

  public static function reflect($op) 
  {

    $reflectedOp = '';

    if (ReflectedOperator::PLUS_SYMBOL == $op) 
    {
      $reflectedOp = ReflectedOperator::MINUS_SYMBOL;
    } 
    elseif (ReflectedOperator::MINUS_SYMBOL == $op) 
    {
      $reflectedOp = ReflectedOperator::PLUS_SYMBOL;
    }
    elseif (ReflectedOperator::MULTIPLY_SYMBOL == $op) 
    {
      $reflectedOp = ReflectedOperator::DEVIDE_SYMBOL;
    }
    elseif (ReflectedOperator::DEVIDE_SYMBOL == $op) 
    {
      $reflectedOp = ReflectedOperator::MULTIPLY_SYMBOL;
    }
    else
    {
      throw new Application\EquationSolver\Exception\UnsupportedOperatorException(
        'Unsupported Operator', 
        403);
    }

    return $reflectedOp;

  }
}
