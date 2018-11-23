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
use app\models\PerhitunganPrioritas;
use app\models\PrioritasSoftSkillAhp;

class ProcessTwoController extends Controller
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
    public function updateData()
    {
        self::MatrixKriteria();
        self::ProcessLamda();
        self::TablePerbandingan();
        // return $this->redirect(['/dashboard/index']);
    }
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
        self::TablePerbandingan();
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
                $eigin[$key2]['eigin'] = (float)$lamda/4;
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
        // echo "<pre>";
        // print_r($total);exit;
        // return print_r($tmp_data);
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

    public function TablePerbandingan()
    {
        $data = TableKaryawan::find()->all();

        $count = count($data);
        $step;
        $list_nama;
        $hasil_akhir;

        $model = new TableKaryawan();
        $dt_column = $model->attributes();

        foreach (array_slice($dt_column, 2) as $key => $col) {
            foreach ($data as $key => $a) {
                $list_nama[$key] = $a['nama'];
                for ($i=0; $i < $count ; $i++) { 
                    $step[$col][$a['nama']][] = $data[$i][$col]/$data[$key][$col];
                }
            }
        }
        foreach (array_slice($dt_column, 2) as $key1 => $col) {
            foreach ($step as $key2 => $st2) {
                foreach ($st2 as $key3 => $a) {
                    if ($key2 == $col) {
                        $final[$col][$key3] = array_sum($st2[$key3]);
                    }
                }
            }
        }
        foreach ($final as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $tmp[$key][] = $value2;
            }
        }
        foreach (array_slice($dt_column, 2) as $key => $a) {
            foreach ($data as $key2 => $b) {
                for ($i=0; $i < 3 ; $i++) { 
                    $tmpx[$a][$b['nama']][] =  $step[$a][$b['nama']][$i]/$final[$a][$b['nama']];
                }

            }
        }
$dataSum = $tmpx;
$dataSum2 = $tmpx;
$list_penjumlah;

        foreach ($tmpx as $key => $value) {
            foreach ($value as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {
                    $dataSum[$key][$key2][$key3] =array_column($value,$key3);
                }
            }
        }
        $eigin = [];
        $z=0;
        foreach ($dataSum as $key => $value) {
            foreach ($value as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {
                    $eigin[$key][$key3] = array_sum($value2[$key3])/count($value2);
                }
            }
        }

        foreach ($eigin as $key => $value) {
            foreach ($value as $key2 => $value2) {
                    $hasil_akhir[$key][$list_nama[$key2]] = $value2;
            }
        }
        $data_eigin = NilaiLamda::find()->select(['eigin'])->asArray()->all();
        $tot_lam = count($data_eigin);
        Yii::$app->db->createCommand()->truncateTable('perhitungan_prioritas')->execute();
        foreach ($list_nama as $key => $nama) {
            if (isset($eigin['komunikasi'][$key]) && isset($eigin['kerjasama'][$key]) && isset($eigin['kejujuran'][$key]) && isset($eigin['interpesonal'][$key])) {
                $model = new PerhitunganPrioritas();
                $model->setAttributes([
                    'nama_karyawan' => $nama,
                    'komunikasi' => $eigin['komunikasi'][$key],
                    'kerjasama' => $eigin['kerjasama'][$key],
                    'kejujuran' => $eigin['kejujuran'][$key],
                    'interpesonal' => $eigin['interpesonal'][$key],
                    'eigin' => $data_eigin[$key]['eigin']
                ]);
                $model->save();
            }else{
                $model = new PerhitunganPrioritas();
                $model->setAttributes([
                    'nama_karyawan' => $nama,
                    'komunikasi' => $eigin['komunikasi'][$tot_lam-2],
                    'kerjasama' => $eigin['kerjasama'][$tot_lam-2],
                    'kejujuran' => $eigin['kejujuran'][$tot_lam-2],
                    'interpesonal' => $eigin['interpesonal'][$tot_lam-2],
                    'eigin' => $data_eigin[$tot_lam-2]['eigin']
                ]);
                $model->save();
            }
        }

        Yii::$app->db->createCommand()->truncateTable('prioritas_soft_skill_ahp')->execute();
        $data_prioritas = PerhitunganPrioritas::find()->asArray()->all();

        foreach (array_slice($dt_column, 2) as $key => $value) {
                $list_eigin[$value] = $data_eigin[$key]['eigin'];
        }
//         echo "<pre>";
// print_r($list_eigin);exit;
        foreach ($data_prioritas as $key => $value) {
            
            $model = new PrioritasSoftSkillAhp();
            $model->setAttributes([
                'nama_karyawan' => $value['nama_karyawan'],
                'nilai' => ($value['komunikasi']*$data_eigin[0]['eigin'])+($value['kerjasama']*$data_eigin[1]['eigin'])+($value['kejujuran']*$data_eigin[2]['eigin']+($value['interpesonal']*$data_eigin[3]['eigin']))
            ]);
            $model->save();
            // echo $value['eigin'];
        }
        // echo "<pre>";
        // print_r($list_nama);
        // print_r($eigin);
        // print_r($dataSum);exit;

        // Finis
        // $x=0;
            
        // foreach ($smfinal as $key => $value) {
        //     foreach ($value as $key2 => $value2) {
        //         if (!isset($dataSum[$key2])) {
        //             $dataSum[$key2] = $value2/count($value);
        //         } else {
        //             $dataSum[$key2] += $value2/count($value);
        //         }
        //     }
        // }

        // foreach ($list_nama as $key => $value) {
        //     $hasil_akhir[$value] = $dataSum[$key];
        // }


        // echo "<pre>";
        // print_r($dataSum);
        // print_r($hasil_akhir);
        // print_r($smfinal);exit;
        // echo "<pre>";
        // print_r($step['step_1']['A']);exit;
        // foreach ($data as $key => $a) {
        //     for ($i=0; $i < $count ; $i++) { 
        //         $step['step_2'][$a['nama']][] = $data[$i]['kerjasama']/$data[$key]['kerjasama'];
        //     }
            
        //     foreach ($step as $key => $b) {

        //         $final['step_2'][$a['nama']] = array_sum($b[$a['nama']]);
        //     }
        // }

        // foreach ($data as $key => $a) {
        //     for ($i=0; $i < $count ; $i++) { 
        //         $step['step_3'][$a['nama']][] = $data[$i]['kejujuran']/$data[$key]['kejujuran'];
        //     }
            
        //     foreach ($step as $key => $b) {

        //         $final['step_3'][$a['nama']] = array_sum($b[$a['nama']]);
        //     }
        // }

        // foreach ($data as $key => $a) {
        //     for ($i=0; $i < $count ; $i++) { 
        //         $step['step_4'][$a['nama']][] = $data[$i]['interpesonal']/$data[$key]['interpesonal'];
        //     }
            
        //     foreach ($step as $key => $b) {

        //         $final['step_4'][$a['nama']] = array_sum($b[$a['nama']]);
        //     }
        // }
        // echo "<pre>";
        // print_r($final);exit;
        // return $step;
    }

}