<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Request;
use app\models\charts\ModelChartOne;
use app\models\charts\ModelChartTwo;
use app\models\charts\ModelChartMerhant;
use app\models\charts\ModelChartAggregator;
use app\models\labels\ModelLabel;
use app\models\labels\Dashboard;
use app\models\charts\Chart_1;

class DataDashboardController extends Controller
{
    // public $enableCsrfValidation = false;
    private $type; 

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'chart-one' => ['post'],
                   // 'chart-two' => ['post'],
                   // 'labels'    => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        $this->type = Yii::$app->user->identity->user_type;

        return parent::beforeAction($action);
    }

    public function actionChartOne($year = null)
    {
        try {

            $model = new Chart_1(); //V2
            $get   = $model->chartOne($this->type);
           // echo "<pre>";
           // print_r($get);exit;
            return json_encode($get);
            
        } catch (\Exception $e) {
            Yii::error('Error Chart One : ' . $e->getMessage());
        }
    }

}
