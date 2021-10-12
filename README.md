## Kurulum
```sh
$ git clone https://github.com/MesutYilmaz01/Kodluyoruz-Teknasyon-BitirmeProjesi.git .
$ cd Kodluyoruz-Teknasyon-BitirmeProjesi/
$ docker-compose up -d
$ cd Kodluyoruz-Teknasyon-BitirmeProjesi/app/
$ docker run --rm --interactive --tty --volume $PWD/.:/app composer install --ignore-platform-reqs
```

## Veritabanı
```sh
Bu sayfa açılır : http://localhost/database/index .
Eğer veritabanı portu meşgul ise;
app/Config içerisindeki AppSetting.php içerisindeki port değiştirilmelidir.
Ana dizindeki docker-compose-yml içerisindeki mysql image içerisindeki por numarası da değiştirilmelidir.
```