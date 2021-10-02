<?php 

  namespace Project\Helper;

  class Logging {

    public static function error($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]\t\tType : ERROR\t\t\tMessage : ".$message."\n";
      Logging::write($message);
    }

    public static function emergency($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]\t\tType : EMERGENCY\t\t\tMessage : ".$message."\n";
      Logging::write($message);
    }

    public static function alert($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]\t\tType : ALERT\t\t\tMessage : ".$message."\n";
      Logging::write($message);
    }

    public static function critical($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]\t\tType : CRITICAL\t\\ttMessage : ".$message."\n";
      Logging::write($message);
    }

    public static function notice($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]\t\tType : NOTICE\t\t\tMessage : ".$message."\n";
      Logging::write($message);
    }

    public static function info($message) {
      $message = "LOG DATE : [".date('d-m-Y:i')."]\t\tType : INFO\t\t\tMessage : ".$message."\n";
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
