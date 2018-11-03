<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Book;

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    
    if($books){
        echo $this->render('_books', ['books'=> $books] ); 
    }
    
    if($user->id){
        echo $this->render('_form', ['model'=> $model] ); 
    }
    
    ?>

</div>
