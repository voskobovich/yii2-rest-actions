<?php

namespace voskobovich\api\controllers;

use voskobovich\api\filters\auth\QueryParamAuth;
use yii\rest\Controller;

/**
 * Class AccessController.
 */
class AccessController extends Controller
{
    /**
     * The list of actions not needing token protection.
     *
     * @var array
     */
    public $unsecuredActions = [];

    /**
     * Behaviors.
     *
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['optional'] = $this->unsecuredActions;
        $behaviors['authenticator']['authMethods'][] = [
            'class' => QueryParamAuth::className(),
            'tokenParam' => 'token',
        ];

        return $behaviors;
    }
}
