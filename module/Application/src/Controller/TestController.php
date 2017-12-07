<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\EquationSolver\EquationSolver;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
      $solver = new EquationSolver('(Y + 24) + (10 x 2) = 99', 'y');

      return new ViewModel([
        'answer'      => $solver->solve(),
      ]);
    }
}

