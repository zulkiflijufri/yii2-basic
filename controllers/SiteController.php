<?php

namespace app\controllers;

use Yii;
use app\models\Comment;
use app\models\ContactForm;
use app\models\LoginForm;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','comment','delete-comment','edit-comment','update-comment'],
                'rules' => [
                    [
                        'actions' => ['logout','comment','delete-comment','edit-comment','update-comment'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
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

    /**
     * Display comment page.
     * @return string
     */
    public function actionComment()
    {
        $comment  = new Comment();

        if ($comment->load(Yii::$app->request->post()) && $comment->validate())
        {
            //$comment->load(Yii::$app->request->post());
            $comment->save();

            Yii::$app->session->setFlash('send_success','Your comment save successfully');

            return $this->redirect(['result-comment']);
        }

        return $this->render('comment',[
            'comment' => $comment
        ]);
    }

    public function actionResultComment()
    {
        // Get all data from table comment
        $data = Comment::find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize'   => 3, //data for one page
            'totalCount'        => $data->count()
        ]);

        $comments = $data->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('result-comment',[
            'comments' => $comments,
            'pagination' => $pagination
        ]);
    }

    public function actionEditComment($id)
    {
        $comment = Comment::findOne($id);

        if ($comment->load(Yii::$app->request->post()) && $comment->validate()) {

            $comment->save();

            Yii::$app->session->setFlash('update_success','Comment update successfully');

            return $this->redirect('result-comment');
        }

        return $this->render('edit',[
            'comment' => $comment
        ]);
    }

    public function actionDeleteComment($id)
    {
        $comment = Comment::findOne($id);

        $comment->delete();

        Yii::$app->session->setFlash('delete_success','Delete comment successfully');

        return $this->redirect('result-comment');
    }
}
