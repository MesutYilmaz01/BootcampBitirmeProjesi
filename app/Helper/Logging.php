<?php 

  namespace Project\Helper;

  class Logging {

    public static function error($user, $message) {
      $message = date('d-m-Y:i')."---".$user->getName()." ".$user->getSurname()."---".$user->getType()."---Error---".$message."\n";
      Logging::write($message);
    }

    public static function emergency($user, $message) {
      $message = date('d-m-Y:i')."---".$user->getName()." ".$user->getSurname()."---".$user->getType()."---Emergency---".$message."\n";
      Logging::write($message);
    }

    public static function alert($user, $message) {
      $message = date('d-m-Y:i')."---".$user->getName()." ".$user->getSurname()."---".$user->getType()."---Alert---".$message."\n";
      Logging::write($message);
    }

    public static function critical($user, $message) {
      $message = date('d-m-Y:i')."---".$user->getName()." ".$user->getSurname()."---".$user->getType()."---Critical---".$message."\n";
      Logging::write($message);
    }

    public static function notice($user, $message) {
      $message = date('d-m-Y:i')."---".$user->getName()." ".$user->getSurname()."---".$user->getType()."---Notice---".$message."\n";
      Logging::write($message);
    }

    public static function info($user, $message) {
      $message = date('d-m-Y:i')."---".$user->getName()." ".$user->getSurname()."---".$user->getType()."---Info---".$message."\n";
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

    public static function getLogs() {
      $root = __DIR__;
      $dir = $root."/../public/assets/log/";
      $temp = scandir($dir,1);
      $files= [];
      for ($i=0; $i< count($temp) - 2 ; $i++)
      {
        $files[] = $temp[$i];
      }
      $data = [];
      foreach ($files as $log)
      {
        $data[$log] = [];
        $handle = fopen($dir.'/'.$log, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                // process the line read.
                $line = explode("---",$line);
                if (Authorization::isModerator())
                {
                  if ($line[2] == 1 || $line[2] == 2)
                  {
                      continue;
                  }
                }
                $data[$log][] = $line;
            }
            fclose($handle);
        } else {
            // error opening the file.
            return array(0,"Dosya okumada bir hata oluştu.");
        } 
      }
      return array(1,$data);

    }
  }
