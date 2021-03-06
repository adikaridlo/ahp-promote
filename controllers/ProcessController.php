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

use app\models\TmpKriteria;
use app\models\MatrixKriteria;
use app\models\NilaiLamda;
use app\models\TableKaryawan;


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
    public function actionUpdateMetrix()
    {
        Yii::$app->db->createCommand()->truncateTable('tmp_kriteria')->execute();
        $data_post = Yii::$app->request->post('TableKriteria');
        $model = new TmpKriteria();
        $model->setAttributes([
            'komunikasi' => $data_post['komunikasi'],
            'kerjasama' => $data_post['kerjasama'],
            'kejujuran' => $data_post['kejujuran'],
            'interpesonal' => $data_post['interpesonal']
        ]);
        $model->save();
        self::MatrixKriteria();
        self::ProcessLamda();
        return $this->redirect(['/table-kriteria/index']);
    }
    public static function Step1()
    {
        $models     =  TmpKriteria::find()->all();

        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => 1/*$value['komunikasi']*/,
                    'kerjasama' => $value['komunikasi'],
                    'kejujuran' => $value['kerjasama'],
                    'interpesonal' => $value['kejujuran'],
            ];
        }
        
        return $data;
    }

    public function Step2()
    {
        $models     =  TmpKriteria::find()->all();
        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => (float)($value['komunikasi']/$value['kerjasama']),
                    'kerjasama' => (float)(1/*$value['kerjasama']/$value['kerjasama']*/),
                    'kejujuran' => (float)($value['kejujuran']/$value['kerjasama']),
                    'interpesonal' => (float)($value['interpesonal']/*/$value['kerjasama']*/)
            ];
        }
        
        return $data;
    }

    public function Step3()
    {
        $models     =  TmpKriteria::find()->all();
        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => (float)($value['komunikasi']/$value['kejujuran']),
                    'kerjasama' => (float)($value['kerjasama']/$value['kejujuran']),
                    'kejujuran' => (float)(1/*$value['kejujuran']/$value['kejujuran']*/),
                    'interpesonal' => (float)($value['interpesonal']/$value['kejujuran'])
            ];
        }
        
        return $data;
    }

    public function Step4()
    {
        $models     =  TmpKriteria::find()->all();
        foreach ($models as $key => $value) {
            $data = [
                    'komunikasi' => (float)($value['komunikasi']/$value['interpesonal']),
                    'kerjasama' => (float)($value['kerjasama']/$value['interpesonal']),
                    'kejujuran' => (float)($value['kejujuran']/$value['interpesonal']),
                    'interpesonal' => (float)(1/*$value['interpesonal']/$value['interpesonal']*/)
            ];
        }
        
        return $data;
    }

    public function ProcessLamda()
    {
        Yii::$app->db->createCommand()->truncateTable('nilai_lamda')->execute();
        $select = [
            '*',
            'sum(komunikasi) as sum_komunikasi',
            'sum(kerjasama) as sum_kerjasama',
            'sum(kejujuran) as sum_kejujuran',
            'sum(interpesonal) as sum_interpesonal'
        ];
        $total = MatrixKriteria::find()->select($select)->all();
        $items = MatrixKriteria::find()->all();
        foreach ($total as $key => $sum) {
            foreach ($items as $key => $value) {
                $model = new NilaiLamda();
                $model->setAttributes([
                    'komunikasi' => (float)($value['komunikasi']/$sum['sum_komunikasi']),
                    'kerjasama' => (float)($value['kerjasama']/$sum['sum_kerjasama']),
                    'kejujuran' => (float)($value['kejujuran']/$sum['sum_kejujuran']),
                    'interpesonal' => (float)($value['interpesonal']/$sum['sum_interpesonal'])
                ]);
                $model->save();
                $tmp_data[] = [
                        'komunikasi' => (float)($value['komunikasi']/$sum['sum_komunikasi']),
                        'kerjasama' => (float)($value['kerjasama']/$sum['sum_kerjasama']),
                        'kejujuran' => (float)($value['kejujuran']/$sum['sum_kejujuran']),
                        'interpesonal' => (float)($value['interpesonal']/$sum['sum_interpesonal'])
                ];
            }
        }

        $select = [
            '*',
            'avg(komunikasi,kerjasama,kejujuran,interpesonal) as avg_komunikasi'
        ];
        
        $eigin = NilaiLamda::find()->all();
        $nilai_lamda = NilaiLamda::find()->all();
        foreach ($tmp_data as $key => $value) {
            $tmp_data[$key] = array_sum($value);
            foreach ($tmp_data as $key2 => $lamda) {
                $eigin[$key2]['eigin'] = $lamda;
                $eigin[$key2]->save();
            }
        }

        // $total[0] = $total[0]['sum_komunikasi'];
        // $total[1] = $total[0]['sum_kerjasama'];
        // $total[2] = $total[0]['sum_kejujuran'];
        // $total[3] = $total[0]['sum_interpesonal']; 
        foreach ($total as $key => $value) {
            $total[$key] = $value['sum_komunikasi'];
        }
        echo "<pre>";
        // print_r($total);exit;
        return print_r($tmp_data);
    }


    public function MatrixKriteria()
    {
        Yii::$app->db->createCommand()->truncateTable('matrix_kriteria')->execute();

         $Step1 = new MatrixKriteria();
         $Step1->setAttributes(self::Step1());

         $Step2 = new MatrixKriteria();
         $Step2->setAttributes(self::Step2());

         $Step3 = new MatrixKriteria();
         $Step3->setAttributes(self::Step3());

         $Step4 = new MatrixKriteria();
         $Step4->setAttributes(self::Step4());

         $Step1->save();
         $Step2->save();
         $Step3->save();
         $Step4->save();
    }

    public function actionTablePerbandingan()
    {
        $data = TableKaryawan::find()->all();
//         echo "<pre>";
//         print_r($data);
// exit;
        $count = count($data);
        $step;
        $list_nama;
        $hasil_akhir;

        foreach ($data as $key => $a) {
            $list_nama[] = $a['nama'];
            for ($i=0; $i < $count ; $i++) { 
                $step['komunikasi'][$a['nama']][] = $data[$i]['komunikasi']/$data[$key]['komunikasi'];
            }
            
            foreach ($step as $key => $b) {

                $final['komunikasi'][$a['nama']] = array_sum($b[$a['nama']]);
            }

            for ($i=0; $i < count($step['komunikasi'][$a['nama']]) ; $i++) { 
                // echo "<br>".$step['step_1'][$a['nama']][$i];
                // echo "<br>".$i.'-'.$step['step_1'][$a['nama']][$i] / $final['step_1'][$a['nama']];
                $smfinal[$a['nama']][$i] = $step['komunikasi'][$a['nama']][$i] / $final['komunikasi'][$a['nama']];
            }
        
        }
        foreach ($smfinal as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if (!isset($dataSum[$key2])) {
                    $dataSum[$key2] = $value2/count($value);
                } else {
                    $dataSum[$key2] += $value2/count($value);
                }
            }
        }

        foreach ($list_nama as $key => $value) {
            $hasil_akhir[$value] = $dataSum[$key];
        }


        echo "<pre>";
        print_r($dataSum);
        print_r($hasil_akhir);
        print_r($smfinal);exit;
        echo "<pre>";
        print_r($step['step_1']['A']);exit;
        foreach ($data as $key => $a) {
            for ($i=0; $i < $count ; $i++) { 
                $step['step_2'][$a['nama']][] = $data[$i]['kerjasama']/$data[$key]['kerjasama'];
            }
            
            foreach ($step as $key => $b) {

                $final['step_2'][$a['nama']] = array_sum($b[$a['nama']]);
            }
        }

        foreach ($data as $key => $a) {
            for ($i=0; $i < $count ; $i++) { 
                $step['step_3'][$a['nama']][] = $data[$i]['kejujuran']/$data[$key]['kejujuran'];
            }
            
            foreach ($step as $key => $b) {

                $final['step_3'][$a['nama']] = array_sum($b[$a['nama']]);
            }
        }

        foreach ($data as $key => $a) {
            for ($i=0; $i < $count ; $i++) { 
                $step['step_4'][$a['nama']][] = $data[$i]['interpesonal']/$data[$key]['interpesonal'];
            }
            
            foreach ($step as $key => $b) {

                $final['step_4'][$a['nama']] = array_sum($b[$a['nama']]);
            }
        }
        echo "<pre>";
        print_r($final);exit;
        return $step;
    }

}