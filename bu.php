<?php 
class Bu{
    public static function view($_templateName, $_templateData=array()){
        extract($_templateData);
        $_fileName = 'view/'.$_templateName.'.php';
        ob_start();
            if(!file_exists($_fileName))
                throw new Exception ('Template '.$_templateName.' not exists!');
            include($_fileName);
            $_content = ob_get_contents();
        ob_end_clean();
        return $_content;
    }
    public static function redirect($path){
        header('Location: '.$path);
        exit;
    }
}
