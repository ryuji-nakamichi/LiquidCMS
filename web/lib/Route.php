<?php


namespace Liqsyst\Utility;


/**
  * ルーティングClass
  *  
  */
class RouteClass {

  // プロパティ
  private $routMap;
  private $uriParameters;
  private $parameterStatStr = '{';


  // コンストラクタ関数
  function __construct($routMap) {
    $this->setUriParameters($_SERVER['REQUEST_URI']);
    $this->setRoutMap($routMap);
  }


  /**
  * 現在アクセス中のURIをプロパティにセットする
  * @param string $request
  * @return void
  */
  private function setUriParameters(string $request): void {
    $this->uriParameters = $request;
  }


  /**
  * 定義済みのルーティングマップ配列をプロパティにセットする
  * @param array $routMap
  * @return array 定義済みのルーティングマップ配列
  */
  private function setRoutMap(array $routMap): array {
    $this->routMap = $routMap;
    return $this->routMap;
  }


  /**
  * ルーティングマップ配列内に「{」が含まれているか走査する
  * @param array $routMap
  * @return array 定義済みのルーティングマップ配列
  * パラメーター有無どちらでも動くようになったので削除予定
  */
  private function routMapParameterStrExists(array $routMap): array {
    $_parameterStatStr = $this->parameterStatStr;
    $_routMap = $routMap; // includeしたルーティングマップ配列
    $cnt = 0;
    foreach((array) $_routMap AS $key => $val) {

      // アクセス中のURL内に、マップデータの定義されたパス内に「{」が含まれているか分岐する
      $mapWithParameters[$cnt]['path'] = $val['path'];
      $mapWithParameters[$cnt]['info'] = $val['info'];

      $cnt++;
    }
    return $mapWithParameters;
  }


  /**
  * パラメーターの開始文字をセットする
  * @param string $parameterStatStr
  * @return string $searchPattern
  */
  private function setSearchPatternStr(array $pregPatternStrArr, string $parameterStatStr): string {
    // パラメータ前半と後半の文字列を連結して、現在アクセス中のURIを走査する
    // 複数のパラメータが含まれる可能性もあるので、パラメータの数だけループさせる
    $searchPattern = ''; 
    foreach($pregPatternStrArr AS $key2 => $val2) {
      if ($key2 === 0) { // 最初のループだけ
        $searchPattern .= "#^";
      }
      if ($key2 > 0) { // 最初と最後以外のループ
        if (strpos($val2, $parameterStatStr) !== false) { // パラメータの場合
          $searchPattern .= "/[a-zA-Z0-9]+";
        } else { // パラメータではない場合
          $searchPattern .= "/{$val2}";
        }
      }
      if ($key2 === (count($pregPatternStrArr) - 1)) { // 最後のループだけ
        $searchPattern .= "$#";
      }
    }

    return $searchPattern;
  }


  /**
  * 現在アクセス中のURIとパターンが一致するかを走査する。
  * 定義済みのルーティングマップ配列の中からルーティングの結果、完全マッチした配列だけ返す
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


      // パラメータ前半と後半の文字列を連結して、現在アクセス中のURIを走査する
      // 複数のパラメータが含まれる可能性もあるので、パラメータの数だけループさせる
      $searchPattern = $this->setSearchPatternStr($pregPatternStrArr, $_parameterStatStr);
      
      if (preg_match($searchPattern, $this->uriParameters)) {
        $mapSearchResult = $val;
        break;
      }

    }

    return $mapSearchResult;
  }


  /**
  * メイン関数実行
  *  
  * @return array ルーティングの結果配列
  */
  public function run(): array {

    // $mapWithParameters = $this->routMapParameterStrExists($this->routMap);
    $mapSearchResult = $this->uriInRoutMapParameter($this->routMap); // マップ内にパラメータが含まれているかを判定後は、現在アクセス中のURIとパターンが一致するかを走査する。

    return $mapSearchResult;
  }

}

