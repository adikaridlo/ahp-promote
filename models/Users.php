<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

use yii\helpers\ArrayHelper;


date_default_timezone_set("Asia/Jakarta");
/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $name
 * @property string $password
 * @property string $user_type
 * @property string $email
 * @property int $is_active
 * @property int $login_failed
 * @property string $last_login_attempt
 * @property string $penalty_time
 * @property string $mid_list
 * @property string $created_date
 * @property string $updated_date
 *
 * @property UserForgotPassword[] $userForgotPasswords
 * @property WebSession[] $webSessions
 */

class Users extends ActiveRecord implements IdentityInterface
{
    public $password_confirm;
    const TYPE_EXECUTOR = 'executor';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type'], 'string'],
            [['is_active', 'login_failed','created_by'], 'integer'],
            [['last_login_attempt', 'penalty_time', 'created_date', 'updated_date', 'phone_number'], 'safe'],
            [['name', 'password','created_by_name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique', 'targetAttribute' => ['email']],
            [['phone_number', 'merchant_id'], 'number'],
            [['phone_number'], 'string', 'min' => '10'],
            [['phone_number'], 'string', 'max' => '15'],
            [['merchant_id', 'mid_list', 'parent_id'], 'safe'],
            [['password'], 'string', 'min' => '8'],
            // [['password'], 'match', 'pattern' => '/\d/', 'message'=>'Password must contain at least one numeric digit.', 'on' => 'create'],
            // [['password'], 'match', 'pattern' => '/\W/', 'message'=>'Password must contain at least one special character.', 'on' => 'create'],
            // [['password'], 'match', 'pattern' => '/[A-Z]/', 'message'=>'Password must contain at least one Uppercase character.', 'on' => 'create'],
            // [['password'], 'match', 'pattern' => '/[a-z]/', 'message'=>'Password must contain at least one Lowercase character.', 'on' => 'create'],
            # [['password'], 'match', 'pattern' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&.])[A-Za-z\d$@$!%*#?&.]{8,}$/', 'message' => 'Password must contain at least 1 Uppercase, 1 Lowercase, 1 Number, and 1 Special Character', 'on' => ['create', 'create_sub']],
            [['password'], 'match', 'pattern' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!-\/:-@\[-`{-~])[A-Za-z\d!-\/:-@\[-`{-~]{8,}$/', 'message' => 'Password must contain at least 1 Uppercase, 1 Lowercase, 1 Number, and 1 Special Character', 'on' => ['create', 'create_sub', 'create_executor']],

            [['name', 'email', 'user_type', 'password', 'password_confirm', 'phone_number'], 'required', 'on' => 'create'],
            [['name', 'email', 'user_type', 'password', 'password_confirm'], 'required', 'on' => 'create_executor'],
            
            [['name', 'email', 'user_type'], 'required', 'on' => 'update'],

            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Password invalid')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
            'password' => 'Password',
            'user_type' => 'User Type',
            'email' => 'Email',
            'is_active' => 'Is Active',
            'login_failed' => 'Login Failed',
            'last_login_attempt' => 'Last Login Attempt',
            'penalty_time' => 'Penalty Time',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'auth_key' => 'Auth Key',
            'merchant_id' => 'Merchant ID',
            'mid_list' => 'MID List',
        ];
    }

    public function behaviors()
    {
        return [
            // 'app\modules\audit\AuditTrailBehavior',
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date', 'updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserForgotPasswords()
    {
        return $this->hasMany(UserForgotPassword::className(), ['user_id' => 'user_id']);
    }

    public static function find()
    {
        return new UsersQuery(get_called_class());
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByEmail($email)
    {
        $users = self::find()->where(['email' => $email])->one();
        if (count($users)) {
            return new static($users);
        }
        return null;
    }

    public static function findById($id)
    {
        $users = self::find()->where(['user_id' => $id])->one();
        if (count($users)) {
            return new static($users);
        }
        return null;
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if (!preg_match('/^\$2[axy]\$(\d\d)\$[\.\/0-9A-Za-z]{22}/', $this->password, $matches)
            || $matches[1] < 4
            || $matches[1] > 30
        ) {
            // throw new InvalidParamException('Hash is invalid.');
            return false;
        }

        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebSessions()
    {
        return $this->hasMany(WebSession::className(), ['user_id' => 'user_id']);
    }

    public function getMerchants()
    {
        return $this->hasOne(Merchant::className(), ['merchant_id' => 'merchant_id']);
    }

    public static function findAvailable($field = 'user_id')
    {
        $select = ['user_id', 'name', 'email', 'user_type'/*, 'is_active', 'merchant_id'*/];
        $data = self::find()->select($select)->asArray()->all();

        $data_list = ArrayHelper::map($data, $field,
            function ($target, $defaultValue) {
                return $target['name'];
            });
        return $data_list;
    }
}