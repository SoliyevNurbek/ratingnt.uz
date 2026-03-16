# Rating-N-T

`Rating-N-T` bu PHP va MySQL asosida yozilgan o'quv platformasi bo'lib, unda foydalanuvchilar ro'yxatdan o'tadi, tizimga kiradi, o'qituvchilar haqida ma'lumot qo'shiladi, studentlar baho beradi va saytga fikr hamda xabar yuboradi.

## Asosiy imkoniyatlar

- foydalanuvchini ro'yxatdan o'tkazish
- login orqali tizimga kirish
- rollar bo'yicha sahifalarga yo'naltirish
- o'qituvchi ma'lumotlarini saqlash
- o'qituvchilarga anonim baho berish
- yangilik qo'shish
- foydalanuvchi fikrlarini saqlash
- aloqa formasi orqali xabar yuborish

## Texnologiyalar

- PHP
- MySQL / phpMyAdmin
- jQuery
- Bootstrap

## Loyiha tuzilmasi

- [`config.php`](/d:/OSPanel/domains/ratingnt.uz/config.php) - markaziy baza konfiguratsiyasi va DB helper klassi
- [`index.php`](/d:/OSPanel/domains/ratingnt.uz/index.php) - bosh sahifa
- [`login/register/index.php`](/d:/OSPanel/domains/ratingnt.uz/login/register/index.php) - ro'yxatdan o'tish sahifasi
- [`login/login/index.php`](/d:/OSPanel/domains/ratingnt.uz/login/login/index.php) - login sahifasi
- [`tanlash.php`](/d:/OSPanel/domains/ratingnt.uz/tanlash.php) - rolga qarab sahifaga yo'naltiradi
- [`students.php`](/d:/OSPanel/domains/ratingnt.uz/students.php) - student bo'limi
- [`teachers.php`](/d:/OSPanel/domains/ratingnt.uz/teachers.php) - o'qituvchi bo'limi
- [`user.php`](/d:/OSPanel/domains/ratingnt.uz/user.php) - foydalanuvchi fikr yuborish sahifasi

## Talablar

- Open Server / OSPanel yoki shunga o'xshash lokal server
- PHP 7.4 yoki undan yuqori
- MySQL
- phpMyAdmin

## O'rnatish

1. Loyihani `d:\OSPanel\domains\ratingnt.uz` ichiga joylang.
2. OSPanel yoki lokal web serverni ishga tushiring.
3. `phpMyAdmin` ni oching.
4. `RNT` nomli baza yarating.
5. Quyidagi SQL kodni `RNT -> SQL` oynasiga joylashtiring.

```sql
CREATE DATABASE IF NOT EXISTS `RNT`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `RNT`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ism` VARCHAR(100) NOT NULL,
  `familya` VARCHAR(100) NOT NULL,
  `usernom` VARCHAR(100) NOT NULL,
  `telnumer` VARCHAR(30) NOT NULL,
  `PASSWORD` VARCHAR(255) NOT NULL,
  `rol_id` INT DEFAULT 3,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_usernom` (`usernom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `Teacher` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ism` VARCHAR(100) NOT NULL,
  `familya` VARCHAR(100) NOT NULL,
  `sharif` VARCHAR(100) NOT NULL,
  `daraja` VARCHAR(255) DEFAULT NULL,
  `chettajriba` VARCHAR(255) DEFAULT NULL,
  `darssoat` VARCHAR(100) DEFAULT NULL,
  `tugilgansana` VARCHAR(50) DEFAULT NULL,
  `maqola_son` INT DEFAULT 0,
  `user_name` VARCHAR(100) DEFAULT NULL,
  `baho` INT DEFAULT 0,
  `baho_sharh` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `news` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tittle` VARCHAR(255) NOT NULL,
  `vaqt` VARCHAR(100) DEFAULT NULL,
  `haqida` TEXT DEFAULT NULL,
  `rasm_name` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `fikrlar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `matn` TEXT NOT NULL,
  `rasm` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `users_xabar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_ism` VARCHAR(100) NOT NULL,
  `user_email` VARCHAR(150) DEFAULT NULL,
  `xabar` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## `config.php` sozlash

Loyiha bitta markaziy konfiguratsiya orqali bazaga ulanadi:

```php
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'RNT');
```

Agar sizda MySQL login yoki parol boshqacha bo'lsa, shu qiymatlarni o'zgartiring.

## Rollar

Loyihada `users.rol_id` ustuni ishlatiladi:

- `1` - student
- `2` - o'qituvchi
- `3` - oddiy foydalanuvchi

[`tanlash.php`](/d:/OSPanel/domains/ratingnt.uz/tanlash.php) fayli foydalanuvchini roliga qarab kerakli sahifaga o'tkazadi.

## Qaysi jadvalga nima yoziladi

- `users` - ro'yxatdan o'tgan foydalanuvchilar
- `Teacher` - o'qituvchi profillari
- `news` - o'qituvchi qo'shgan yangiliklar
- `fikrlar` - foydalanuvchi sharhlari va fikrlari
- `users_xabar` - aloqa formasi orqali kelgan xabarlar

## Ishga tushirish

1. OSPanel serverni ishga tushiring.
2. Brauzerda `http://ratingnt.uz/` manzilini oching.
3. Ro'yxatdan o'ting yoki mavjud foydalanuvchi bilan login qiling.
4. Rolga qarab tizim sizni kerakli bo'limga o'tkazadi.

## Muhim eslatma

- `uploads/` papkasi yozish huquqiga ega bo'lishi kerak.
- `users` jadvalidagi parollar hozir `md5()` bilan saqlanmoqda.
- `admin.php` hozircha amalda ishlatilmayapti yoki bo'sh bo'lishi mumkin.

## Tavsiya etiladigan testlar

- yangi foydalanuvchi ro'yxatdan o'tkazish
- login tekshirish
- o'qituvchi qo'shish
- o'qituvchiga baho berish
- fikr yuborish
- aloqa formasi orqali xabar yuborish

## Muammo bo'lsa

Agar baza ulanishida xato bo'lsa:

1. `config.php` dagi host, user, password va db nomini tekshiring
2. `RNT` baza mavjudligini tekshiring
3. kerakli jadvallar yaratilganini tekshiring
4. PHP da `mysqli` yoqilganini tekshiring

## Muallif uchun eslatma

Bu loyiha lokal muhitda ishlash uchun tayyorlangan. Keyinchalik xavfsizlikni oshirish uchun quyidagilar tavsiya qilinadi:

- `md5()` o'rniga `password_hash()` va `password_verify()` ishlatish
- prepared statement qo'shish
- validatsiyani kuchaytirish
- ruxsat va session tekshiruvlarini soddalashtirish

