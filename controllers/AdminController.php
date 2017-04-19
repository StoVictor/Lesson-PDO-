<?php
    class AdminController{
        
        public function actionAdd(){
            $article = new News;
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            $result = $article->save();
            header('Location: index.php');
            return $result;
        }
        public function actionDel(){
            $article = new News;
            $article->title = $_POST['title'];
            $result = $article->delete();
            header('Location: index.php');
            return $result;
        }
    }

?>