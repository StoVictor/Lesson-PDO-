<?php
    class Viewer implements Iterator {
        const PATH = __DIR__ . '/../views/';
        protected $data;
        protected $position;
        
        public function __construct(){
            $this->position = 0;
        }
        
        public function __set($key,$val){
            $this->data[$key] = $val;
        }
        
        public function __get($key){
            return $this->data[$key];
        }
        
        public function current(){
            $i = 0;
            foreach ($this->data as $key=>$prop){
                if($i == $this->position){
                    return $prop;
                }
            $i++;
            }
        }
        
        public function next(){
            ++$this->position;
        }
        
        public function key(){
           return $this->position; 
        }
        
        public function valid(){
            $i = 0;
            foreach($this->data as $key=>$prop){
                if($i == $this->position){
                    return isset($prop);
                }
            $i++;
            } 
        }
        
        public function rewind(){
           $this->position = 0; 
        }
        
        public function render($template){
            foreach($this->data as $key => $val){
                $$key = $val;
            }
            ob_start();
            include $this->PATH.$template;
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        
        public function display($template){
            echo $this->render($template);
        }
            
    }

?>