<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tmp_kriteria".
 *
 * @property int $id
 * @property int $komunikasi
 * @property int $kerjasama
 * @property int $kejujuran
 * @property int $interpesonal
 */
class TmpKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmp_kriteria';
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
            'interpesonal' => 'Interpesonal',
        ];
    }
}
