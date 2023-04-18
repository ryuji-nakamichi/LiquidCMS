<?php


namespace Liqsyst\Lib\Utility;


/**
* 汎用的Class
*  
*/
class UtilityClass {


  public $data;


  /**
   * 現在アクセス中のURIとパターンが一致するかを走査する
   * 定義済みのルーティングマップ配列の中からルーティングの結果、完全マッチした配列だけ返す
   *
   * @param array $mapWithParameters
   * @return array $mapSearchResult
   */
  public static function getUriInRoutMapParameter(array $mapWithParameters): array {
    $parameterStatStr = '{';
    $mapSearchResult = [];
    
    foreach((array) $mapWithParameters AS $key => $val) {

      // 動的に正規表現パターンを作成する
      $search = "#{[a-z0-9]+}#";
      $path = $val['path'];

      preg_match_all($search, $path, $pregStrArr);
      $pregPatternStrArr = explode('/', $path);
      $searchPattern = self::setSearchPatternStr($pregPatternStrArr, $parameterStatStr);
      
      if (preg_match($searchPattern, self::uriParameters)) {
        $mapSearchResult = $val;
        break;
      }

    }
    return $mapSearchResult;
  }

  public function setRouteCurrentMap($routeMap) {
    $this->data = $routeMap;
  }
  public function getRouteCurrentMap() {
    return $this->data;
  }


}

