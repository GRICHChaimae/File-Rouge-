<?php

require_once '../../model/paginate.php';

class BolgController{
  
    public function getAllBlogs(){
        $getAll = new Blog();
        $Blogs = $getAll->getAll();
        return $Blogs ;
    }  


    var $data;

    public  function Paginate($vlaues,$per_page){
            $total_values = count($vlaues);
            
            if(isset($_GET['page']))
            {
                $current_page = $_GET['page'];
            }
            else
            {
                $current_page = 1;
            }
            $counts = ceil($total_values / $per_page);
            $param1 = ($current_page - 1) * $per_page;
            $this->data = array_slice($vlaues,$param1,$per_page);

            for($x = 1; $x <= $counts; $x++)
            {
                $numbers[] = $x;
            }

            return $numbers;
        } 

        public function fetchResult(){
            $resultesValues = $this->data;
            return $resultesValues ;
        }    

}    

?>