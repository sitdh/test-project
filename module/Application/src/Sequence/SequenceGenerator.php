<?php 

namespace Application\Sequence;

class SequenceGenerator
{

  public static function element(array $msg) : int
  {
    $i = 1;
    foreach($msg as $e)
    {
      if (is_numeric($e)) { $i++; }
    }

    return 3 + ($i - 1) * $i;
  }
}