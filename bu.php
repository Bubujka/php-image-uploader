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
    public static function config($path){
        return self::configGet($path);
    }

    private static $configArray = array();
    private static function configGet($configFullPath){
        preg_match('@(.+)/([^/]+)@',$configFullPath,$match);
        $path = '';
        $key = '';
        if(isset($match[1]))
            $path = $match[1];
        if(isset($match[2]))
            $key = $match[2];

        if(!array_key_exists($configFullPath, self::$configArray) and
           !array_key_exists($path,self::$configArray)){
            $catched = 0;
            try{
                self::tryToPreloadConfig($path);
            }catch(Exception $e){
                $catched++;
            }
            try{
                self::tryToPreloadConfig($configFullPath);
            }catch(Exception $e){
                if($catched == 1)
                    throw $e;
            }

        }
        if(array_key_exists($configFullPath, self::$configArray))
            return self::$configArray[$configFullPath];
        if (array_key_exists($key,self::$configArray[$path])) 
            return self::$configArray[$path][$key]; 
        throw new Exception('Config key "'.$configFullPath.'" not exists');
    }
    private static function tryToPreloadConfig($path){
        $corePath = 'etc/core/'.$path.'.php';
        $hostPath = 'etc/'.HTTP_HOST.'/'.$path.'.php';

        if(!file_exists($corePath) and !file_exists($hostPath))
            throw new Exception('Config file for path='.$path.' not exists');
        foreach(array($corePath, $hostPath) as $v)
            if (file_exists($v))
                include($v);
        self::$configArray[$path] = $config;
    }
}
