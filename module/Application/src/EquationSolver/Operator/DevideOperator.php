<?php

namespace Application\EquationSolver\Operator;

class DevideOperatorOperator implements OperatorInterface
{
  public function calculate($leftOperand, $rightOperand) : int
  {
    return intval(intval($leftOperand) / intval($rightOperand));
  }
}
