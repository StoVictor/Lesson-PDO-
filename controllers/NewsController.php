<?php
    class NewsController {
        
        public function actionAll(){            
            $view = new Viewer();
            $view->item = News::findAll();
            echo $view->display('all.php');
        }
        
        public function actionOne(){
            $id = $_GET['id'];
            $view = new Viewer();
            $view->item = News::findOneByPk($id);
            echo $view->display('one.php');
        }  
    }


?>