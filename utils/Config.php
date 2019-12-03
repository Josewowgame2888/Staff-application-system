<?php
class Config
{
    public $extension = ".cache";

    public function create($file,$name, array $datos): void
    {
        if(file_exists($file.$name.$this->extension))
        {
          unlink($file.$name.$this->extension);
          $fopen = fopen($file.$name.$this->extension,"w");
            $this->seralizeDatos($datos,$file.$name.$this->extension);
          fclose($fopen);
        } else {
          $fopen = fopen($file.$name.$this->extension,"w");
          $this->seralizeDatos($datos,$file.$name.$this->extension);
          fclose($fopen);
        }
    }
        
        public function seralizeDatos(array $datos,$file): void
        {
          $final = json_encode($datos);
          file_put_contents($file,$final);
        }
        
        
        
        public function getData($file,$name,$dato)
        {
          if(file_exists($file.$name.$this->extension)){
          $data = file_get_contents($file.$name.$this->extension);
        $products = json_decode($data, true);
        $search_array = $products;
        if(array_key_exists($dato,$search_array)){
          return $products[$dato];
        }
        }
        }

        public function get($file,$name,$dato)
        {
            
        }
        
        
        
        public function setData($file,$name,$dato,$nuevo){
        
          if(file_exists($file.$name.$this->extension)){
        
            $data = file_get_contents($file.$name.$this->extension);
        
        $far = json_decode($data,true);
        
        $far[$dato] = $nuevo;
        
        $datos = json_encode($far);
        
        file_put_contents($file.$name.$this->extension,$datos);
        
        }else{
        
          echo $this->getError()." ERROR_FILE_NO_EXIST";
        
        }
        
        }

}