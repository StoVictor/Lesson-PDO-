<?php
    abstract class AbstractModel {
        static protected $table;
        
        protected $data = [];

        
        public function __set($k,$v){
            $this->data[$k] = $v;
        }
        public function __get($k){
            $this->data[$k];
        }
        
        public function get_data(){
            return $this->data;
        }
    
    public static function findAll(){
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Database;
        $db->setClassName($class);
        return $db->query($sql);
    }
        public static function findOneByPk($id){
            $class = get_called_class();
            $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
            $db = new Database;
            $db->setClassName($class);
            return $db->query($sql, [':id' => $id])[0];
        }
        
        public static function findByColumn($col, $val){
            $class = get_called_class();
            $sql = 'SELECT * FROM ' . static::$table . ' WHERE '.$col.'= :val';
            $db = new Database;
            $db->setClassName($class);
            $normCol = ':'. $col;
            return $db->query($sql, [':val' => $val])[0];
        }
        
        
        
      protected function insert(){
            $cols = array_keys($this->data);
            $data = [];
            foreach ($cols as $col){
                $data[':' . $col] = $this->data[$col];
            }
            $sql = 'INSERT INTO ' . static::$table . '
            ('.implode(', ',$cols).') 
            VALUES 
            ('.implode(', ',array_keys(($data))).')
            ';
            
            $db = new Database();
            $db->execute($sql,$data);
            $insertedArticle = static::findByColumn('title', $this->data['title']);
            return  $insertedArticle->data['id'];
        }
        
        protected function update(){
            $sql = 'UPDATE ' .static::$table. ' SET title = :title, text = :text WHERE title = :title';
            $db = new Database;
            $db->execute($sql,[':title' => $this->data['title'], ':text' => $this->data['text']]);
            $insertedArticle = static::findByColumn('title', $this->data['title']);
            return  $insertedArticle->data['id']; 
        }
        
        public function delete(){
            $sql = 'DELETE FROM ' . static::$table . ' WHERE title = :title';
            $db = new Database();
            return $db->execute($sql, [':title' => $this->data['title']]);
        }
        
        public function save(){
            if(static::findByColumn('title',$this->data['title']) == false){
                $this->insert();
            } else {
                $this->update();
            }
        }
        
    }

?>