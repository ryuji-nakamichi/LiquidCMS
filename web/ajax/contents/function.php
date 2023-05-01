<?php

namespace Liqsyst\ajax;

/**
 * Ajax経由で送られてきたデータをグループ別にセットする
 *
 * @param [array] $posts
 * @return array 
 */
function setPostsdata($posts) {
  $data = [];
  foreach ($posts AS $key => $val) {
    if (preg_match('#^.+_preg$#', $key)) {
      $postsPreg[$key] = $val;
    } else {
      $postsData[$key] = $val;
    }
  }
  $data['preg'] = $postsPreg;
  $data['posts'] = $postsData;
  return $data;
}