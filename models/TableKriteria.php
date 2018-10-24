<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "table_kriteria".
 *
 * @property int $id
 * @property int $komunikasi
 * @property int $kerjasama
 * @property int $kejujuran
 * @property int $interpesona
 */
class TableKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['komunikasi', 'kerjasama', 'kejujuran', 'interpesonal'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'komunikasi' => 'Komunikasi',
            'kerjasama' => 'Kerjasama',
            'kejujuran' => 'Kejujuran',
            'interpesonal' => 'Interpesona',
        ];
    }

    public static function dataKriteria($params)
    {
        $data = self::find()->select([$params])->all();

        $data_list = ArrayHelper::map($data, $params,
                function ($target, $defaultValue) use ($params) {
                    return $target[$params];
                });

        return $data_list;
    }
}
