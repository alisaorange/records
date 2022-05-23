<?php

namespace app\controllers;

use app\models\Record;
use app\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AdministrationController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function () {
                            // Метод isAdministrator() вернет true или false в зависимости от роли пользователя.
                            if(Yii::$app->user->identity->status == User::STATUS_ACTIVE_ADMIN){
                                return Yii::$app->user->identity->status == User::STATUS_ACTIVE_ADMIN;
                            }else{
                                return Yii::$app->getResponse()->redirect(['/error']);
                            }
                        },

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];

    }


    public function actionIndex()
    {
        $records = Yii::$app->curl->getRecords();
        return $this->render('index', compact('records'));

    }


    public function actionCreate()
    {
        $record = new Record();

        if ($this->request->isPost) {
            if ($record->load($this->request->post())) {
                $result = Yii::$app->curl->setRecords($this->request->post()["Record"]);
                if($result->message == 'Пользователь был создан.'){
                    Yii::$app->session->setFlash('success', $result->message);
                }else{
                    Yii::$app->session->setFlash('error', $result->message);
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'record' => $record,
        ]);
    }

    public function actionUpdate($id)
    {
        $record_api = Yii::$app->curl->findRecord($id);
        $record = new Record();
        $record->id = $record_api->id;
        $record->name = $record_api->name;
        $record->email = $record_api->email;
        $record->phone = $record_api->phone;

        if ($this->request->isPost && $record->load($this->request->post())) {
            $result = Yii::$app->curl->updateRecords($this->request->post()["Record"]);
            if($result->message == 'Пользователь был обновлён.'){
                Yii::$app->session->setFlash('success', $result->message);
            }else{
                Yii::$app->session->setFlash('error', $result->message);
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'record' => $record,
        ]);
    }


}
