<?php

namespace Liqsyst\Lib\Route;

require_once('lib/Controller.php');
use Liqsyst\Lib\Controller\ControllerClass as Controller;


/**
 * RouteClass
 */
class RouteClass {

  // プロパティ
  private $routeMap; // index.phpでインクルードされたルーティングマップ配列を格納
  private $uriParameters; // 現在アクセス中のURIを格納
  private $parameterStatStr = '{'; // ルーティングマップ配列内にて、パラメーターが設定されている場合は波括弧で括るので、開始部分だけ格納


    
  /**
   * コンストラクタ
   *
   * @param array $routeMap ルーティングマップ配列
   */
  function __construct($routeMap) {
    $this->setUriParameters($_SERVER['REQUEST_URI']);
    $this->setRouteMap($routeMap);
  }


  /**
   * 現在アクセス中のURIをプロパティにセットする
   *
   * @param  string $request
   * @return void
   */
  private function setUriParameters(string $request): void {
    $this->uriParameters = $request;
  }


  /**
   * 定義済みのルーティングマップ配列をプロパティにセットする
   *
   * @param array $routMap
   * @return array 定義済みのルーティングマップ配列
   */
  private function setRouteMap(array $routMap): array {
    $this->routeMap = $routMap;
    return $this->routeMap;
  }


  /**
   * パラメーターの開始文字をセットする
   * パラメータ前半と後半の文字列を連結して、現在アクセス中のURIを走査する
   * 複数のパラメータが含まれる可能性もあるので、パラメータの数だけループさせる
   *
   * @param string $parameterStatStr
   * @param string $parameterStatStr
   * @return string $searchPattern
   */
  private function setSearchPatternStr(array $pregPatternStrArr, string $parameterStatStr): string {
    $searchPattern = ''; 
    foreach($pregPatternStrArr AS $pregKey => $pregVal) {
      if ($pregKey === 0) { // 最初のループだけ
        $searchPattern .= "#^";
      }
      if ($pregKey > 0) { // 最初以外のループ
        if (strpos($pregVal, $parameterStatStr) !== false) { // パラメータの場合
          $searchPattern .= "/[a-zA-Z0-9]+";
        } else { // パラメータではない場合
          $searchPattern .= "/{$pregVal}";
        }
      }
      if ($pregKey === (count($pregPatternStrArr) - 1)) { // 最後のループだけ
        $searchPattern .= "$#";
      }
    }
    return $searchPattern;
  }


  /**
   * 現在アクセス中のURIとパターンが一致するかを走査する
   * 定義済みのルーティングマップ配列の中からルーティングの結果、完全マッチした配列だけ返す
   *
   * @param array $mapWithParameters
   * @return array $mapSearchResult
   */
  private function uriInRoutMapParameter(array $mapWithParameters): array {
    $_parameterStatStr = $this->parameterStatStr;
    $mapSearchResult = [];
    
    foreach((array) $mapWithParameters AS $key => $val) {

      // 動的に正規表現パターンを作成する
      $search = "#{[a-z0-9]+}#";
      $path = $val['path'];

      preg_match_all($search, $path, $pregStrArr);
      $pregPatternStrArr = explode('/', $path);
      $searchPattern = $this->setSearchPatternStr($pregPatternStrArr, $_parameterStatStr);
      
      if (preg_match($searchPattern, $this->uriParameters)) {
        $mapSearchResult = $val;
        break;
      }

    }
    return $mapSearchResult;
  }

  
  /**
   * コントローラーを実行する
   * マップ内にパラメータが含まれているかを判定後は、現在アクセス中のURIとパターンが一致するかを走査
   * 最終的に、ルーティングと完全マッチした配列だけを一つ抽出してコントローラー実行関数へ渡す
   *
   * @param  array $routeMap
   * @return void
   */
  private function contorollerExe(array $routeMap): void {
    $mapSearchResult = $this->uriInRoutMapParameter($routeMap);
    // print_r($mapSearchResult);
    // exit;
    $ControllerObj = new Controller();
    $ControllerObj->run($mapSearchResult);
  }


  /**
  * メイン関数実行
  *  
  * @return void
  */
  public function run(): void {
    $this->contorollerExe($this->routeMap);
  }

}

