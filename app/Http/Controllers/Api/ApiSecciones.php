<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Util\ApiAuthMode;
use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class ApiSecciones extends Controller
{
    public $authMode;
    public function __construct(ApiAuthMode $authMode)
    {
        $this->authMode= $authMode;
    }

    public function getAll($params=[])
    {
        $default = [
          'with' => 'centro'
        ];
        $params = array_merge($default,$params);

        $api = new ApiConsume($this->authMode);
        $api->get("api/v1/cursos",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function getId($id,$params=[])
    {
        $default = [
          'with' => 'centro'
        ];
        $params = array_merge($default,$params);

        $api = new ApiConsume($this->authMode);
        $api->get("api/v1/cursos/{$id}",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}