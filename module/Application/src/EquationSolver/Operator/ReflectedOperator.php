<?php

namespace Application\EquationSolver\Operator;

class ReflectedOperator 
{
  public static function reflected($op) 
  {
    const PLUS_SYMBOL     = '+';
    const MINUS_SYMBOL    = '-';
    const MULTIPLY_SYMBOL = 'x';
    const DEVIDE_SYMBOL   = '/';

    $reflectedOp = '';

    if (PLUS_SYMBOL == $op) 
    {
      $reflectedOp = '-';
    } 
    elseif (MINUS_SYMBOL == $op) 
    {
      $reflectedOp = '+';
    }
    elseif (MULTIPLY_SYMBOL == $op) 
    {
      $reflectedOp = '/';
    }
    elseif (DEVIDE_SYMBOL == $op) 
    {
      $reflectedOp = 'x';
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
