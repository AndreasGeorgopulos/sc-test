<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Php developer próbafeladat
### A feladat

A feladat megoldásához használj php7.4-t vagy nagyobbat, laravel keretrendszert és mysql adatbázist.
Hozz létre egy git repót és megoldásonként commitolj.

1. Hozz létre egy xml-t.
Az xml-ben a következő adatok szerepeljenek:
- ADOAZONOSITOJEL: 778899112
- TELJESNEV: Ügyvezető Mihály
- AZONOSITO: 1
- EGYEBID: 1
- BELEPES: 2015.09.08
- KILEPES: 2021.09.08
- EMAILCIM: ugyvezeto.mihaly@gmail.com
Az xml-ben legalább 5 különböző személy adatai legyenek feltüntetve.

2. Készíts egy adatbázist, amely tárolni fogja az xmlből feldolgozott adatokat 'persons', illetve logokat 'logs'.

3. Laravel keretrendszer alatt készíts egy rövid alkalmazást, ahol az elkészített xml feltölthető egy formon keresztűl.
A formot ellenőrizd, hogy csakis xml dokumentumot lehessen feltölteni. ( A validálást megoldhatod frontend vagy backend oldalt )

4. A feldolgozás menetében figyelj, hogy az egyedi azonosítók egyediek is legyenek.

5. Minden egyes feldolgozott "person" adatról készíts log bejegyzést. Ezt tárold le az adatbázisban.

6. A feldolgozás végeztével a feldolgozás eredményét add át egy felületnek ami megjeleníti, hogy egy egy személy sikeresen, sikertelenül rögzítésre került e.

7. Hozz létre egy egy felületet, ahol nyomonkövethető a már létrejött person és log adatok.


### Letöltés:
```
git clone https://github.com/AndreasGeorgopulos/sc-test.git sc-test
cd sc-test
```

### Dockerizáció (opcionális):
Lehetőség van Docker konténerben futtatni az alkalmazást. A beállítások a docker-compose.yml file-ban és a docker mappában találhatók.
```
docker-compose up -d --build
docker exec -it sc-test-web sh
```

Az alkalmazás elérése: http://localhost:2800

Adminer: http://localhost:2801 (host: sc-test-db, username: sc_user, password: sc_pwd)


### Telepítés:
Futtasd az alábbi parancsokat.
```
composer install
cp .env.dev .env
php artisan key:generate
npm install
php artisan migrate
npm run build
```

> A project gyökérkönyvtárában található people.xml-el lehet tesztelni
