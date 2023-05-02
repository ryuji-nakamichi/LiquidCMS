<?php

namespace Liqsyst\Requests\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_REQUESTS_PATH . 'Utility.php');
use Liqsyst\Requests\RegexUtilityClass as Requests;


/**
 * ContentsRegexClass
 */
class ContentsRegexClass {

  
  /**
  * メイン関数実行
  *
  * @param  array $regexs
  * @param  array $values
  * @return array $flgs
  */
  public function run(array $regexs, array $values): array {
    $RegexUtilityObj = new Requests();
    $regexNames = $RegexUtilityObj->setRegexName($regexs);
    $flgs = $RegexUtilityObj->checkPostValues($regexNames, $values);
    return $flgs;
  }

}
