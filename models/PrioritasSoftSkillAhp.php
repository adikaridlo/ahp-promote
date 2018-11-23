<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prioritas_soft_skill_ahp".
 *
 * @property int $id
 * @property string $nama_karyawan
 * @property double $nilai
 */
class PrioritasSoftSkillAhp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prioritas_soft_skill_ahp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nilai'], 'number'],
            [['nama_karyawan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_karyawan' => 'Nama Karyawan',
            'nilai' => 'Nilai',
        ];
    }
}
