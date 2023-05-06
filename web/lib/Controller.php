<?php

namespace Liqsyst\Lib\Controller;

/**
 * ControllerClass
 */
class ControllerClass {

  
  /**
   * コントローラーのファイル名をセットする
   * マッチするルーティングがなければ、404用のコントローラーをセットする
   *
   * @param  array $routeMap
   * @return string $controllerName
   */
  private function setControllerName (array $routeMap): string {
    $directoryName = 'controllers/';
    $extName = '.php';
    $controllerName = (!count($routeMap)) ? $directoryName . 'NotFoundController' . $extName: 'controllers/' . $routeMap['info']['controller'] . $extName;
    return $controllerName;
  }


  /**
   * 共通変数をセットする
   *
   * @return array $view
   */
  private function setCommonView (): array {
    $view = [];


    return $view;
  }

  
  /**
   * ルーティングマップ配列を引数に渡して指定されたコントローラーを実行する
   * {$routeMap}変数はコントローラー内にてrequireされているPHPファイル内にて参照可能
   * requireされる以下のファイル内に任意の変数をパラメーターとして渡したい場合、こちらに変数を定義するだけで渡される
   * ただ、この関数内に変数を定義する場合、グローバルな変数扱いになるので、特定のviewファイル内にだけ変数を読み込みたい場合は、「/controllers/」以下の対応するコントローラーファイル内にて変数を定義すること
   * 
   * @param array $routeMap 最終的に一つだけマッチしたルーティングマップ配列
   * @return void
   */
  public function run(array $routeMap): void {
    $controllerName = $this->setControllerName($routeMap);
    $view = $this->setCommonView();
    require_once($controllerName);
  }

}

