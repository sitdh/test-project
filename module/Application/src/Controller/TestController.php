<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\EquationSolver\EquationSolver;

use Application\Sequence\SequenceGenerator;

use Zend\Cache\PatternFactory;

class TestController extends AbstractActionController
{
  private static $sequenceCache;

  private static $solverCache;

  public function __construct() 
  {
    TestController::$solverCache = new SequenceGenerator();
    // $seq = new SequenceGenerator();
    // $this->sequenceCache = PatternFactory::factory('object', [
    //   'object'                => $seq,
    //   'object_key'            => 'sequence',
    //   'storage'               => 'apc',
    //   'object_cache_methods'  => ['element'],
    // ]);

    TestController::$sequenceCache = new EquationSolver();
    // $solver = new EquationSolver();
    // $this->solverCache = PatternFactory::factory('object', [
    //   'object'                => $solver,
    //   'object_key'            => 'solver',
    //   'storage'               => 'apc',
    //   'object_cache_methods'  => ['solve'],
    // ]);
  }
  public function indexAction()
  {
    $solver = new EquationSolver();
    return new ViewModel([
      'sequence'  => TestController::$solverCache->element([3,5,9,15, 'x']),
      'answer'    => TestController::$sequenceCache->solve('(Y + 24) + (10 x 2) = 99', 'y'),
    ]);
  }
}

