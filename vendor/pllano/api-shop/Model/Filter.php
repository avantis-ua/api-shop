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
 
namespace ApiShop\Model;
 
use ApiShop\Model\Pagination;
 
class Filter {
 
    function __construct($url_path, $getArray = array())
    {
        $this->url_path = $url_path;
        foreach($getArray as $key => $unit){$this->$key = $unit;}
    }
 
    // Лимит товаров на страницу
    public function limit()
    {
        $array = [
            "5" => "5",
            "10" => "10",
            "25" => "25",
            "50" => "50",
            "100" => "100",
            "200" => "200",
            "500" => "500"
        ];
        $limit_array = array();
        foreach($array as $key => $unit)
        {
            if (isset($this->offset)){$arr['offset'] = $this->offset;}
            if (isset($this->order)){$arr['order'] = $this->order;}
            if (isset($this->sort)){$arr['sort'] = $this->sort;}
            if (isset($key)){$arr['limit'] = $key;}
            if (isset($this->brand_id)){$arr['brand_id'] = $this->brand_id;}
            if (isset($this->type)){$arr['type'] = $this->type;}
            if (isset($this->brand)){$arr['brand'] = $this->brand;}
            if (isset($this->serie)){$arr['serie'] = $this->serie;}
            if (isset($this->articul)){$arr['articul'] = $this->articul;}
            if (isset($this->name)){$arr['search'] = $this->name;}
            if (isset($this->alias)){$arr['alias'] = $this->alias;}
            $resp["url"] = $this->url_path.'?'.http_build_query($arr);
            $resp["key"] = $key;
            $resp["name"] = $unit;
            $response[] = $resp;
        }
        return $response;
    }
 
    // Сортировка по полю из списка данного в массиве
    public function sort($array)
    {
        foreach($array as $key => $unit)
        {
            if (isset($this->offset)){$arr['offset'] = $this->offset;}
            if (isset($this->order)){$arr['order'] = $this->order;}
            if (isset($key)){$arr['sort'] = $key;}
            if (isset($this->limit)){$arr['limit'] = $this->limit;}
            if (isset($this->brand_id)){$arr['brand_id'] = $this->brand_id;}
            if (isset($this->type)){$arr['type'] = $this->type;}
            if (isset($this->brand)){$arr['brand'] = $this->brand;}
            if (isset($this->serie)){$arr['serie'] = $this->serie;}
            if (isset($this->articul)){$arr['articul'] = $this->articul;}
            if (isset($this->name)){$arr['search'] = $this->name;}
            if (isset($this->alias)){$arr['alias'] = $this->alias;}
            $resp["url"] = $this->url_path.'?'.http_build_query($arr);
            $resp["key"] = $key;
            $resp["name"] = $unit;
            $response[] = $resp;
        }
        return $response;
    }
 
    // Сортировка ASC или DESC
    public function order()
    {
        $key = "ASC";
        $name = "icon-sort-amount-asc";
        if ($this->order == "DESC") {
            $key = "ASC";
            $name = "icon-sort-amount-asc";
        }
        if ($this->order == "ASC") {
            $key = "DESC";
            $name = "icon-sort-amount-desc";
        }
        if (isset($this->offset)){$arr['offset'] = $this->offset;}
        if (isset($key)){$arr['order'] = $key;}
        if (isset($this->sort)){$arr['sort'] = $this->sort;}
        if (isset($this->limit)){$arr['limit'] = $this->limit;}
        if (isset($this->brand_id)){$arr['brand_id'] = $this->brand_id;}
        if (isset($this->type)){$arr['type'] = $this->type;}
        if (isset($this->brand)){$arr['brand'] = $this->brand;}
        if (isset($this->serie)){$arr['serie'] = $this->serie;}
        if (isset($this->articul)){$arr['articul'] = $this->articul;}
        if (isset($this->name)){$arr['search'] = $this->name;}
        if (isset($this->alias)){$arr['alias'] = $this->alias;}
        $resp["url"] = $this->url_path.'?'.http_build_query($arr);
        $resp["key"] = $key;
        $resp["name"] = $name;
        $response[] = $resp;
        return $response;
    }
 
    // Пагинация
    public function paginator($totalItems)
    {
        $currentPage = $this->offset + 1; // Страница
        $itemsPerPage = $this->limit; // Товаров на странице
        $neighbours = 4; // Колличество линков по обе стороны от активного
        $pagination = new Pagination($totalItems, $currentPage, $itemsPerPage, $neighbours);
        $pages = $pagination->build(); // Contains associative array with a numbers of a pages
        $new_offset = $pagination->offset();
        $number_pages = intval($totalItems / $this->limit); // Вычисляем колличество страниц
        $paginator = '';
        if ($number_pages >= 2) {
            foreach($pages as $key => $pag_item)
            {
                $real_key = $key - 1;
                $arr = array();
                if ($real_key >= 1) {$arr['offset'] = $real_key;}
                if (isset($this->order)){$arr['order'] = $this->order;}
                if (isset($this->sort)){$arr['sort'] = $this->sort;}
                if (isset($this->limit)){$arr['limit'] = $this->limit;}
                if (isset($this->brand_id)){$arr['brand_id'] = $this->brand_id;}
                if (isset($this->type)){$arr['type'] = $this->type;}
                if (isset($this->brand)){$arr['brand'] = $this->brand;}
                if (isset($this->serie)){$arr['serie'] = $this->serie;}
                if (isset($this->articul)){$arr['articul'] = $this->articul;}
                if (isset($this->name)){$arr['search'] = $this->name;}
                if (isset($this->alias)){$arr['alias'] = $this->alias;}
                $pagination_url = $this->url_path.'?'.http_build_query($arr);
                $previous = '';
                $next = '';
                if ($pag_item == 'first') {
                    $previous = '<li class="page-item"><a class="page-link" href="'.$pagination_url.'">&larr; '.$real_key.'</a></li>';
                }
                if ($pag_item == 'less') {
                    $previous = '<li class="page-item"><a class="page-link" href="'.$pagination_url.'">'.$real_key.'</a></li>';
                }
                if ($pag_item == 'previous') {
                    $previous = '<li class="page-item"><a class="page-link" href="'.$pagination_url.'">'.$real_key.'</a></li>';
                }
                if ($pag_item == 'current') {
                    $next = '<li class="page-item active"><a class="page-link" href="#">'.$real_key.'</a></li>';
                }
                if ($pag_item == 'next') {
                    $next = '<li class="page-item"><a class="page-link" href="'.$pagination_url.'">'.$real_key.'</li>';
                }
                if ($pag_item == 'more') {
                    $next = '<li class="page-item"><a class="page-link" href="'.$pagination_url.'">'.$real_key.'</a></li>';
                }
                if ($pag_item == 'last') {
                    $previous = '<li class="page-item"><a class="page-link" href="'.$pagination_url.'">'.$real_key.' &rarr;</a></li>';
                }
                $paginator .= $previous.''.$next;
            }
        }
        return $paginator;
    }
 
}
     