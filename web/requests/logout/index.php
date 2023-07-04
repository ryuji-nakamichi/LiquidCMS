<?php

namespace Liqsyst\Requests\Logout;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_REQUESTS_PATH . 'Utility.php');
use Liqsyst\Requests\RegexUtilityClass as Requests;


/**
 * LogoutRegexClass
 */
class LogoutRegexClass {

  
  /**
  * メイン関数実行
  *
  * @param  array $regexs
  * @param  array $values
  * @return bool $flg
  */
  public function run(array $regexs, array $values): bool {
    $RegexUtilityObj = new Requests();
    $regexNames = $RegexUtilityObj->setRegexName($regexs);
    $flgs = $RegexUtilityObj->checkPostValues($regexNames, $values);
    $flg = $RegexUtilityObj->checkExistsErr($flgs);
    return $flg;
  }

}
