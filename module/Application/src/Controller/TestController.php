<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\EquationSolver\EquationSolver;

use Application\Sequence\SequenceGenerator;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
      $e = SequenceGenerator::element([3, 5, 9, 15, 'X']);
      $solver = new EquationSolver('(Y + 24) + (10 x 2) = 99', 'y');

      return new ViewModel([
        'sequence'  => $e,
        'answer'    => $solver->solve(),
      ]);
    }
}

