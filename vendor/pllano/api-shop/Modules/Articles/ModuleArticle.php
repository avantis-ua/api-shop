<?php 
/**
 * Pllano {API}$hop (https://pllano.com)
 *
 * @link https://github.com/pllano/api-shop
 * @version 1.2.1
 * @copyright Copyright (c) 2017-2018 PLLANO
 * @license http://opensource.org/licenses/MIT (MIT License)
 */
namespace Pllano\ApiShop\Modules\Articles;

use Psr\Http\Message\{ServerRequestInterface as Request, ResponseInterface as Response};
use Psr\Container\ContainerInterface as Container;
use Pllano\Interfaces\ModuleInterface;
use Pllano\Core\Module;

class ModuleArticle extends Module implements ModuleInterface
{

    public function __construct(Container $app, $route = null, $block = null, $modulKey = null, $modulVal = [])
    {
        $this->_table = 'article';
        $this->_idField = 'article_id';
		parent::__construct($app, $route, $block, $modulKey, $modulVal);
		// $this->connectContainer();
    }

    public function get(Request $request)
    {
        // Получаем alias из url
        if ($request->getAttribute('alias')) {
            $alias = clean($request->getAttribute('alias'));
        } else {
            $alias = null;
        }

        $content = [];
        $contentArr = [];
        $heads = [];
        $return = [];
		$moduleArr = [];

        // Конфигурация пакета
        $moduleArr['config'] = $this->modulVal;

        $query = [
            "alias" => $alias
        ];
        // Database GET
        $responseArr = $this->db->get($this->_table, $query);

        if (isset($responseArr)) {
                // Если данные в виде объекта переводим в массив
                $data = $responseArr['0'];
                if(is_object($data)) {
                    $data = (array)$data;
                }

                $data["text"] = htmlspecialchars_decode($data["text"]);
                $data["text_ru"] = htmlspecialchars_decode($data["text_ru"]);
                $data["text_ua"] = htmlspecialchars_decode($data["text_ua"]);
                $data["text_en"] = htmlspecialchars_decode($data["text_en"]);
                $data["text_de"] = htmlspecialchars_decode($data["text_de"]);
                $contentArr['content'] = $data;

                $head["title"] = $data["title"];
                $head["seo_title"] = $data["seo_title"];
                $head["seo_keywords"] = $data["seo_keywords"];
                $head["seo_description"] = $data["seo_description"];
                $head["og_url"] = $data["og_url"];
                $head["og_title"] = $data["og_title"];
                $head["og_description"] = $data["og_description"];
                $heads['head'] = $head;

        }

        $content['content']['modules'][$this->modulKey] = $contentArr + $moduleArr;
        $return = array_replace_recursive($heads, $content);
        return $return;
    }
    
    public function post(Request $request)
    {
		return null;
	}

}
 