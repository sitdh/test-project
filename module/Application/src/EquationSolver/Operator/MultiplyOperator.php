<?php

namespace Application\EquationSolver\Operator;

class MultiplyOperator implements OperatorInterface
{
  public function calculate($leftOperand, $rightOperand) : int
  {
    return intval($leftOperand) * intval($rightOperand);
  }
}
