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

## Sayfa Linkleri
```sh
Site Anasayfası             : http://localhost/main/index .
Login Sayfası               : http://localhost/login/login .
Admin Panel Anasayfası      : http://localhost/admin/index . 
Bakım Modundan Çıkmak İçin  : http://localhost/maintance/login .
```

## Default Hesaplar
```sh
Admin        : E-mail : a@gmail.com  Şifre : 11223344
Moderatör    : E-mail : m@gmail.com  Şifre : 11223344
Editör       : E-mail : e@gmail.com  Şifre : 11223344
Kullanıcı    : E-mail : k@gmail.com  Şifre : 11223344
```