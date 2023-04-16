<?php

namespace console\controllers;

use Yii;

use yii\console\Controller;
use common\models\Fruits;
use linslin\yii2\curl;

class FruitsController extends Controller
{
    
    public function actionFetch()
    {
        //Init curl
        $curl = new curl\Curl();
        //get http://fruityvice.com/
        $response = $curl->get('https://fruityvice.com/api/fruit/all');
        $responseArr = json_decode($response, true);
        $count = 0;
        foreach ($responseArr as $key => $value) {
            $fruit = new Fruits();
            $value['nutritions'] = json_encode($value['nutritions']);
            $value['ext_id'] = $value['id'];
            $value['fruit_order'] = $value['order'];
            $fruit->attributes = $value;
            if($fruit->save()){
                $count++;
            }
            
        }

        echo $count." number of fruits imported succesfully.";
    }
}
