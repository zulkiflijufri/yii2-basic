<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Employee;

class EmployeeController extends Controller
{
    public function actionIndex()
    {
        $employees = Employee::find()->all();

        return $this->render('index',[
            'employees' => $employees
        ]);
    }

    public function actionCreate()
    {
    	$employee = new Employee();

    	if (Yii::$app->request->post())
    	{
            $employee->load(Yii::$app->request->post());
            if ($employee->save()) {
                Yii::$app->session->setFlash('success','Data berhasil disimpan');
            } else {
                Yii::$app->session->setFlash('error','Data gagal disimpan');
            }
            // return $this->refresh();
            return $this->redirect('index');
    	} else {
            return $this->render('create',[
                'employee' => $employee
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $employee = Employee::findOne($id);
        if (Yii::$app->request->post()) {
            $employee->load(Yii::$app->request->post());
            if ($employee->save()) {
                Yii::$app->session->setFlash('success','Data berhasil diupdate');
            } else {
                Yii::$app->session->setFlash('error','Data gagal diupdate');
            }
            // return $this->refresh();
            return $this->redirect('index');
        } else {
            return $this->render('update',[
                'employee' => $employee
            ]);
        }
    }

    public function actionDelete($id)
    {
        $employee = Employee::findOne($id);
        $employee->delete();
        return $this->redirect('index');
    }
}