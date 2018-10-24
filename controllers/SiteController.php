<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TrxMaster;
use app\models\TrxDetail;
use app\models\PayParseLog;
use app\models\Users;
use app\components\FTPHelper;

class SiteController extends Controller
{    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        $session = Yii::$app->session;
        if (!$session->isActive)
        $session->open();
        return true;
    }

    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        // your custom code here
        $session = Yii::$app->session;
        if (!$session->isActive)
        $session->open();
        $session->close();
        // $session->destroy();
        return $result;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // return $this->render('index');
        $this->redirect('/dashboard');
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        
        $this->layout = "login_layout";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/dashboard/index');
        }

        Yii::$app->assetManager->bundles = [
            // 'yii\bootstrap\BootstrapPluginAsset' => false,
            'yii\bootstrap\BootstrapAsset' => false,
            'app\assets\AppAsset' => false,
            // 'yii\web\JqueryAsset' => false,
        ];

        return $this->render('new_login', [
            'model' => $model,
        ]);
    }

    public function actionRegistration()
    {
        return $this->redirect('/dashboard');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDownloadTermCondition()
    {
        $path = "/uploads/Syarat dan Ketentuan MOM.docx";
        $file = \Yii::getAlias('@app') . '/web' . $path;

        if(!empty($file)){ 

            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Expires: 0");
            header("Pragma: no-cache");
            header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document; charset=UTF-8");
            header('Content-Disposition: attachment; filename="'.basename($file).'"');

            ob_clean();
            flush();
            readfile($file);
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTestSftp()
    {
        echo FTPHelper::pull();
    }
}
