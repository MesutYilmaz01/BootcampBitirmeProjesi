<?php 

  namespace Project\Helper;

  class Logging {

    public static function error($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
      Logging::write($message);
    }

    public static function emergency($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: EMERGENCY        Message:".$message."\n";
      Logging::write($message);
    }

    public static function alert($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ALERT        Message:".$message."\n";
      Logging::write($message);
    }

    public static function critical($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: CRITICAL        Message:".$message."\n";
      Logging::write($message);
    }

    public static function notice($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: NOTICE        Message:".$message."\n";
      Logging::write($message);
    }

    public static function info($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: INFO        Message:".$message."\n";
      Logging::write($message);
    }

    public static function write($message) {
      $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
      if (!file_exists( $file ))
      {
          $dosya = fopen($file, "w");
      }else
      {
          $dosya = fopen($file, "a");
      }
      $sonuc = fwrite($dosya, $message);
      fclose($dosya);
    }

  }
