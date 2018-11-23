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
use app\models\PrioritasSoftSkillAhp;
use app\models\SoftSkillSearch;


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
       $model = new ModelForm();
       $searchModel = new SoftSkillSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

}