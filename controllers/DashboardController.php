<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\Users;
use app\models\charts\ModelChart;
use app\models\charts\ModelForm;
use app\models\MerchantTransaction;


class DashboardController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        // \Yii::$app->session->setFlash('path','null');
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}