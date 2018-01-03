# Демонстрация работы API Shop

## Демо сайт
[xti.com.ua](https://xti.com.ua/) — Работает на текущих на файлах API Shop. Здесь вы можете видеть реальный статус разработки.

### Конфигурация демо сайта
- [Конфигурация](https://github.com/pllano/api-shop/blob/master/app/config/settings.php)
```php
// Название основной базы данных. По умолчанию api
$config["db"]["master"] = "api";
// Название резервной базы данных. По умолчанию jsonapi
$config["db"]["slave"] = "jsonapi";
```
#### По какому признаку мы храним данные в той или иной базе данных
- API - данные которые часто меняются
- Elasticsearch - данные которые записываются по накопительной и редко изменяются.
- json - данные которые имеют небольшой размер и не меняются
- MySQL - оставили статьи только для демонстрации работы

### Список ресурсов и источников данных
```php
// Конфигурация сайта
$config["resource"]["site"]["db"] = "api";
// Цены и наличие товаров
$config["resource"]["price"]["db"] = "api";
// Корзина
$config["resource"]["cart"]["db"] = "api";
// Заказы
$config["resource"]["order"]["db"] = "api";
// Оплаты
$config["resource"]["pay"]["db"] = "api";
// Контакты
$config["resource"]["contact"]["db"] = "api";
// Мультиязычность (Локализация)
$config["resource"]["language"]["db"] = "jsonapi";
// Данные пользователей
$config["resource"]["user"]["db"] = "json";
// Уровни доступа пользователей
$config["resource"]["role"]["db"] = "json";
// Адреса
$config["resource"]["address"]["db"] = "json";
// Валюты
$config["resource"]["currency"]["db"] = "json";
// Описания товаров
$config["resource"]["description"]["db"] = "elasticsearch";
// Категории
$config["resource"]["category"]["db"] = "elasticsearch";
// Каталог товаров
$config["resource"]["product"]["db"] = "elasticsearch";
// Типы товаров
$config["resource"]["type"]["db"] = "elasticsearch";
// Бренды
$config["resource"]["brand"]["db"] = "elasticsearch";
// Серии
$config["resource"]["serie"]["db"] = "elasticsearch";
// Изображения
$config["resource"]["images"]["db"] = "elasticsearch";
// Параметры (Свойства)
$config["resource"]["params"]["db"] = "elasticsearch";
// SEO
$config["resource"]["seo"]["db"] = "elasticsearch";
// Статьи
$config["resource"]["article"]["db"] = "mysql";
// Категории статей
$config["resource"]["article_category"]["db"] = "mysql";
```
## Пример внедрения API Shop
Интернет-магазин [life24.com.ua](https://life24.com.ua/) работает на API Shop `1.0.1-ALFA-1` через API платформы [PLLANO Marketplace](https://pllano.com/) документация [PLLANO API](https://github.com/pllano/pllano-api)