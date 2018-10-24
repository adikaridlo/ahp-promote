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

use app\models\TableKriteria;


class ProcessController extends Controller
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
    
    public static function Step1()
    {
        $models     =  TableKriteria::find()->all();

        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => $value['komunikasi'],
                    'kerjasama' => $value['kerjasama'],
                    'kejujuran' => $value['kejujuran'],
                    'interpesonal' => $value['interpesonal'],
            ];
        }
        
        return $data;
    }

    public function Step2()
    {
        $models     =  TableKriteria::find()->all();
        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => (float)($value['komunikasi']/$value['kerjasama']),
                    'kerjasama' => (float)($value['kerjasama']/$value['kerjasama']),
                    'kejujuran' => (float)($value['kejujuran']/$value['kerjasama']),
                    'interpesonal' => (float)($value['interpesonal']/$value['kerjasama'])
            ];
        }
        
        return $data;
    }

    public function Step3()
    {
        $models     =  TableKriteria::find()->all();
        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => (float)($value['komunikasi']/$value['kejujuran']),
                    'kerjasama' => (float)($value['kerjasama']/$value['kejujuran']),
                    'kejujuran' => (float)($value['kejujuran']/$value['kejujuran']),
                    'interpesonal' => (float)($value['interpesonal']/$value['kejujuran'])
            ];
        }
        
        return $data;
    }

    public function Step4()
    {
        $models     =  TableKriteria::find()->all();
        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => (float)($value['komunikasi']/$value['interpesonal']),
                    'kerjasama' => (float)($value['kerjasama']/$value['interpesonal']),
                    'kejujuran' => (float)($value['kejujuran']/$value['interpesonal']),
                    'interpesonal' => (float)($value['interpesonal']/$value['interpesonal'])
            ];
        }
        
        return $data;
    }

}