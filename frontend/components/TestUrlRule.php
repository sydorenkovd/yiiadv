<?php

namespace frontend\components;

use yii\web\UrlRuleInterface;
use yii\base\Object;

class TestUrlRule extends Object implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
        if ($route === 'doing/item-detail') {
            if (isset($params['title'])) {
                return 'doing/'.$params['title'];
            }
        }
        return false;  // this rule does not apply
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();

        if (preg_match('%^([^\/]*)\/([^\/]*)$%', $pathInfo, $matches)) {
            if($matches[1] == 'doing')
            {
                $params = [ 'title' => $matches[2]];
                return ['doing/item-detail', $params];
            }
            else
            {
                return false;
            }
        }
        return false;  // this rule does not apply
    }
}