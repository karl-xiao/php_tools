class index {
    private static $obj;

    public static function getInstance() {
        return self::$obj = new self();
    }

    public static function getFiles($dir) {
        $handle = opendir($dir);
        if (!$handle) {
            return null;
        } else {
            while (($fl = readdir($handle)) !== false) {
                $temp = $dir . DIRECTORY_SEPARATOR . $fl;
                //如果不加  $fl!='.' && $fl != '..'  则会造成把$dir的父级目录也读取出来
                if (is_dir($temp) && $fl != '.' && $fl != '..') {
                    self::getFiles($temp);
                } else {
                    if ($fl != '.' && $fl != '..') {
                        echo '文件：' . $temp . '<br>';
                    }
                }
            }
        }
        return true;
    }
}
