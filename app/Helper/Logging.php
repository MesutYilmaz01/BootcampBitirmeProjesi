<?php 

  namespace Project\Helper;

  class Logging {

    public static function error($message) {
        $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
        if (!file_exists( $file ))
        {
            $dosya = fopen($file, "w");
        }else
        {
            $dosya = fopen($file, "a");
        }
        $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
        $sonuc = fwrite($dosya, $message);
        fclose($dosya);
    }

    public static function emergency($message) {
      $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
      if (!file_exists( $file ))
      {
          $dosya = fopen($file, "w");
      }else
      {
          $dosya = fopen($file, "a");
      }
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
      $sonuc = fwrite($dosya, $message);
      fclose($dosya);
    }

    public static function alert($message) {
      $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
      if (!file_exists( $file ))
      {
          $dosya = fopen($file, "w");
      }else
      {
          $dosya = fopen($file, "a");
      }
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
      $sonuc = fwrite($dosya, $message);
      fclose($dosya);
    }

    public static function critical($message) {
      $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
      if (!file_exists( $file ))
      {
          $dosya = fopen($file, "w");
      }else
      {
          $dosya = fopen($file, "a");
      }
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
      $sonuc = fwrite($dosya, $message);
      fclose($dosya);
    }

    public static function notice($message) {
      $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
      if (!file_exists( $file ))
      {
          $dosya = fopen($file, "w");
      }else
      {
          $dosya = fopen($file, "a");
      }
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
      $sonuc = fwrite($dosya, $message);
      fclose($dosya);
    }

    public static function info($message) {
      $file = __DIR__."/../public/assets/log/log-".date('d-m-Y').".txt";
      if (!file_exists( $file ))
      {
          $dosya = fopen($file, "w");
      }else
      {
          $dosya = fopen($file, "a");
      }
      $message = "LOG DATE : [".date('d-m-Y:i')."]        Type: ERROR        Message:".$message."\n";
      $sonuc = fwrite($dosya, $message);
      fclose($dosya);
    }

  }
