<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\db\Query;

use app\models\TableKaryawan;
class ProcessAhpController extends Controller
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

    public function actionMatrixPerbandingan()
    {
    	$karyawan  = TableKaryawan::find()->all();
    	$model = new TableKaryawan();
        $dt_column = $model->attributes();

        foreach (array_slice($dt_column, 2) as $key => $col) {
        	foreach ($karyawan as $key => $value) {
    			$dataPerbandingan[$col][] = $value[$col];
        	}

    	}
    	foreach (array_slice($dt_column, 2) as $key => $col) {
    		$final[$col][] = $dataPerbandingan[$col][0] - $dataPerbandingan[$col][1];
    		$final[$col][] = $dataPerbandingan[$col][0] - $dataPerbandingan[$col][2];
    		$final[$col][] = $dataPerbandingan[$col][1] - $dataPerbandingan[$col][0];
    		$final[$col][] = $dataPerbandingan[$col][1] - $dataPerbandingan[$col][2];
    		$final[$col][] = $dataPerbandingan[$col][2] - $dataPerbandingan[$col][0];
    		$final[$col][] = $dataPerbandingan[$col][2] - $dataPerbandingan[$col][1];
    	}

    	foreach ($final as $key => $value) {
    		foreach ($value as $key2 => $value2) {
    			if ($value2 <= 0) {
    				$p[$key][] = 0;
    			}else{
    				$p[$key][] = 1;
    			}
    		}
    	}
    	echo "<pre>";
    	print_r($p);
    	print_r($final);
    	print_r($dataPerbandingan);exit;
    }

}
?>