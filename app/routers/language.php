<?php
/**
 * This file is part of the API SHOP
 *
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/pllano/api-shop
 * @version 1.0.1
 * @package pllano.api-shop
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
use Slim\Http\Request;
use Slim\Http\Response;
use Adbar\Session;
use Sinergi\BrowserDetector\Language as Langs;
use ApiShop\Config\Settings;
use ApiShop\Resources\Language;

// Меняем язык отображения в session пользователя
$app->post('/language', function (Request $request, Response $response, array $args) {
    // Подключаем конфигурацию
    $config = (new Settings())->get();
    // Подключаем сессию
    $session = new Session($config['settings']['session']['name']);
    $langs = new Langs();
    // Получаем массив данных из таблицы language на языке из $session->language
    if (isset($session->language)) {
        $lang = $session->language;
    } elseif ($langs->getLanguage()) {
        $lang = $langs->getLanguage();
    } else {
        $lang = $site_config["language"];
    }
    // Получаем данные отправленные нам через POST
    $post = $request->getParsedBody();
    $lang = filter_var($post['id'], FILTER_SANITIZE_STRING);
    if ($lang) {
        // Записываем в сессию язык выбранный пользователем
        if ($lang == 1) {$session->language = "ru";}
        if ($lang == 2) {$session->language = "ua";}
        if ($lang == 3) {$session->language = "en";}
        if ($lang == 4) {$session->language = "de";}
    }
    $language = (new Language())->get($session->language);
    foreach($language as $key => $value)
    {
        $arr["id"] = $key;
        $arr["name"] = $value;
        $languages[] = $arr;
    }
    // callback - Даем ответ в виде json о результате
    $callback = array(
        'language' => $session->language,
        'languages' => $languages,
        'status' => 200
    );
    // Выводим заголовки
    $response->withStatus(200);
    $response->withHeader('Content-type', 'application/json');
    // Выводим json
    echo json_encode($callback);
});

// Меняем язык отображения в session пользователя
$app->get('/language', function (Request $request, Response $response, array $args) {
    // Подключаем конфигурацию
    $config = (new Settings())->get();
    // Подключаем сессию
    $session = new Session($config['settings']['session']['name']);
    $langs = new Langs();
    // Получаем массив данных из таблицы language на языке из $session->language
    if (isset($session->language)) {
        $lang = $session->language;
    } elseif ($langs->getLanguage()) {
        $lang = $langs->getLanguage();
    } else {
        $lang = $site_config["language"];
    }
    $language = (new Language())->get($lang);
    foreach($language as $key => $value)
    {
        $arr["id"] = $key;
        $arr["name"] = $value;
        $languages[] = $arr;
    }
    // callback - Даем ответ в виде json о результате
    $callback = array(
        'language' => $lang,
        'languages' => $languages,
        'status' => 200
    );
    // Выводим заголовки
    $response->withStatus(200);
    $response->withHeader('Content-type', 'application/json');
    // Выводим json
    echo json_encode($callback);
});
 