<?php 

namespace Application\EquationSolver;

use Application\EquationSolver\Operator\OperatorFactory;
use Application\EquationSolver\Operator\OperatorInterface;

use Application\EquationSolver\Operator\ReflectedOperator;

class EquationSolver 
{

  private $equation;

  private $dataSet;

  private $variableSide;

  public function solve(string $equation, string $variable) : string
  {

    $this->prepare($equation, $variable);

    $processEquation = $this->{$this->var_side};

    preg_match_all('/\(.*?\)/', $processEquation, $matches);

    $result = 0;
    foreach($matches[0] as $exp) 
    {
      if (FALSE != stripos($exp, $this->variable)) 
      { 
        $exp = str_replace('(', '', str_replace(')', '', $exp));
        $processEquation = str_replace("({$exp})", $exp, $processEquation);
        continue; 
      }

      $operator = OperatorFactory::factory($exp);
      $exp = str_replace('(', '', str_replace(')', '', $exp));
      $numbers = preg_split('/(\+|-|x|\/)/', $exp);

      if (!empty($numbers)) {
        $result = $operator->calculate($numbers[0], $numbers[1]);
        $processEquation = str_replace("({$exp})", $result, $processEquation);
      }

    }

    $processEquation = str_replace($this->variable, '', $processEquation);
    eval('$result = ' . $processEquation . ';');

    $leadOperator = ($result >= 0) ? '+' : '-' ;

    $number = $this->move($this->var_side, $leadOperator, $result);
    return "{$number}";
  }

  public function __get(string $var)
  {
    $message = NULL;

    if (array_key_exists($var, $this->dataSet)) 
    {
      $message = $this->dataSet[$var];
    } 

    return $message;
  }

  public function __set(string $var, $value) 
  {
    if (array_key_exists($var, $this->dataSet))
    {
      $this->dataSet[$var] = $value;
    }
  }

  private function move($currentSide, $leadOperator, $value) 
  {
    $targetOperator = OperatorFactory::factory(ReflectedOperator::reflect($leadOperator));
    return $targetOperator->calculate(
      intval($this->{$this->opposite($currentSide)}),
      $value
    );
  }

  private function opposite($currentSide) : string
  {
    return ('left' == $currentSide) ? 'right' : 'left' ;
  }

  private function prepare(string $equation, string $variable)
  {
    $this->equation = $equation;
    $this->dataSet = [
      'left'        => '',
      'right'       => '',
      'variable'    => '',
      'var_side'    => '',
      'original_eq' => '',
    ];

    $this->dataSet['original_eq'] = $equation;

    list($this->dataSet['left'], $this->dataSet['right']) = explode('=', strtolower(str_replace(' ', '', $equation)));
    $this->dataSet['variable'] = strtolower($variable);

    $this->variableSide = (stripos($variable, $this->dataSet['left']) >= 0) ? 'left' : 'right';
    $this->dataSet['var_side'] = $this->variableSide;
  }

}
