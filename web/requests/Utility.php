<?php

namespace Liqsyst\Requests;

/**
 * RegexUtilityClass
 */
class RegexUtilityClass {

  
  /**
   * バリデーションルールをセットする
   * マッチする分岐がなければ、空文字をセットする
   *
   * @param  array $regexs
   * @return array $regexNames
   */
  public function setRegexName (array $regexs): array {
    $regexNames = [];
    foreach ((array)$regexs AS $key => $val) {
      if ($val === 'alpha') {
        $regexNames[$key] = "/^[a-zA-Z]+[_]?[a-zA-Z]+$/";
      } else if ($val === 'integerNotZero') {
        $regexNames[$key] = "/^[1-9]{1}[0-9]*$/";
      } else if ($val === 'integer') {
        $regexNames[$key] = "/^[0-9]+$/";
      }
    }
    return $regexNames;
  }

  /**
   * バリデーションルールを元に、値をチェックする
   *
   * @param  array $regexs
   * @param  array $values
   * @return array $flgs
   */
  public function checkPostValues (array $regexs, array $values): array {
    $flgs = [];
    foreach ((array)$values AS $key => $val) {
      if (preg_match($regexs[$key. '_preg'], $val)) {
        $flgs[$key] = 0;
      } else {
        $flgs[$key] = 1;
      }
    }
    return $flgs;
  }

}
