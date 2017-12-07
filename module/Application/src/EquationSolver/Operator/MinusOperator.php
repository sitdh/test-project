<?php

namespace Application\EquationSolver\Operator;

class MinusOperator implements OperatorInterface
{
  public function calculate($leftOperand, $rightOperand) : int 
  {
    return intval($leftOperand) - intval($rightOperand);
  }
}
