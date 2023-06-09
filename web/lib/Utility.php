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


  /**
   * Setter
   *
   * @param array $routeMap
   * @return void
   */
  public function setRouteCurrentMap($routeMap): void {
    $this->data = $routeMap;
  }


  /**
   * Getter
   *
   * @return array $this->data
   */
  public function getRouteCurrentMap(): array {
    return $this->data;
  }


  /**
   * 現在アクセス中の任意のパラメータを一つ取得する
   *
   * @param int $index 添字
   * @return string $parameter
   */
  public function getUriOneParameter($index): string {
    $parameter = '';
    $parameterStrArr = [];
    $uriWithParameter = $_SERVER['REQUEST_URI'];
    if (strpos($uriWithParameter, '/') !== false) { // 「/」が含まれていれば
      $parameterStrArr = explode('/', $uriWithParameter);
      $parameter = $parameterStrArr[$index];
    }
    return $parameter;
  }


  /**
   * ログインユーザーのデータをセッションにセットする
   * 
   * @param array $data
   * @param string $key
   * @return array
   */
  public function setLoginUserSession($data, $key): array {
    $sessions = [];
    $sessions[$key] = $data;
    return $sessions;
  }


  /**
   * ログイン中か判定する
   * 
   * @return bool
   */
  public function isLogin(): bool {
    $flg = false;
    $flg = (isset($_SESSION['user']) && $_SESSION['user']) ? true: false;
    return $flg;
  }


  /**
   * ログアウトする
   * 
   * @param bool $loginFlg
   * @return bool
   */
  public function logout($loginFlg): bool {
    $flg = false;
    if ($loginFlg) {
      $_SESSION['user'] = array();
      if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', 0, '/'); // ブラウザを閉じるとログアウト扱いにする
      }
      session_destroy();
      $flg = true;
    }
    return $flg;
  }


}

