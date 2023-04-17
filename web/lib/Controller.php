<?php

namespace Liqsyst\Utility;

/**
 * ControllerClass
 */
class ControllerClass {

  
  /**
   * ルーティングマップ配列を引数に渡して指定されたコントローラーを実行する
   * {$routeMap}変数はコントローラー内にてrequireされているPHPファイル内にて参照可能
   * requireされる以下のファイル内に任意の変数をパラメーターとして渡したい場合、こちらに変数を定義するだけで渡される
   * ただ、この関数内に変数を定義する場合、グローバルな変数扱いになるので、特定のviewファイル内にだけ変数を読み込みたい場合は、「/controllers/」以下の対応するコントローラーファイル内にて変数を定義すること
   * 
   * @param array $routeMap 最終的に一つだけマッチしたルーティングマップ配列
   * @return void
   */
  public function conrrollerRun(array $routeMap): void {
    require_once('controllers/' . $routeMap['info']['controller'] . '.' . 'php');
  }

}

