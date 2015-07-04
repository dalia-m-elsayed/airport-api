<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use \yii\web\ForbiddenHttpException;

/**
 * Airport Controller API
 */
class AirportController extends ActiveController {
    
    public $modelClass = 'api\modules\v1\models\Airport';
    
    public function behaviors() {
        
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className()
        ];
        
        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params=[]) {
        
        $acl = array(
            "admin" => array(
                "index",
                "view",
                "create",
                "update",
                "delete"
            ),
            "user" => array(
                "index",
                "view",
                "create",
                "update"
            ),
            "guest" => array(
                "index",
                "view"
            )
        );
        
        $userRole = \Yii::$app -> user -> identity -> role;

        if(!in_array($action, $acl[$userRole])){
            throw new ForbiddenHttpException('User not allowed to perform this action');
        }
    }

}
