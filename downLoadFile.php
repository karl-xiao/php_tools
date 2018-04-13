/**
     * 下载远程图片到本地
     * @param $url
     * @param $localPath
     * @param int $timeout
     * @return bool
     */
    public static function downloadHttpFile($url, $localPath, $timeout = 60)
    {
        if (!$url || !$localPath) {
            return false;
        }
        $pathInfo = @pathinfo($localPath);
        if (empty($pathInfo)) {
            return false;
        }

        $localDir = $pathInfo['dirname'];
        if (!is_dir($localDir)) {
            if (!mkdir($localDir, 0755, true)) {
                return false;
            }
        }
        $url = str_replace(" ", "%20", $url);

        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $temp = curl_exec($ch);
            if (@file_put_contents($localPath, $temp) && !curl_error($ch)) {
                return $localPath;
            } else {
                return false;
            }
        } else {
            $opts    = array(
                "http" => array(
                    "method"  => "GET",
                    "header"  => "",
                    "timeout" => $timeout
                )
            );
            $context = stream_context_create($opts);
            if (@copy($url, $localPath, $context)) {
                //$http_response_header
                return $localPath;
            } else {
                return false;
            }
        }
    }
