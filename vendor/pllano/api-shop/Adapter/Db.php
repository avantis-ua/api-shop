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
 
namespace ApiShop\Adapter;
 
use Slim\Http\Request;
use Slim\Http\Response;
 
use ApiShop\Config\Settings;
 
class Db {
 
    private $args;
    private $request;
    private $response;
    private $config;
 
    public function __construct(Request $request, Response $response, array $args, $config)
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;
        $this->config = $config;
    }
 
    public function run()
    {
        return true;
    }
 
}
 