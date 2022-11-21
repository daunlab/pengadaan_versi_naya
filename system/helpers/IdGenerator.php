<?php

namespace helper;

class IdGenerator {
  public static function generateId($useMd5=false){
    $uid = uniqid(time(), true);
    
    if($useMd5) {
      $uid = md5($uid);
    }
    
    return $uid;
  }
}