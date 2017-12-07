<?php

namespace Application\EquationSolver\Operator;

interface OperatorInterface 
{
  public function calculate($leftOperand, $rightOperand);
}
