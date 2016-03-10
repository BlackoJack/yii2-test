<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 10.03.2016
 * Time: 21:41
 */

namespace app\modules\user\controllers;


use app\modules\user\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\widgets\ActiveForm;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }

    public function actionUpdate()
    {
        $model = $this->findModel();
        $model->scenario = User::SCENARIO_PROFILE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
}