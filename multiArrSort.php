/**
 * 二维数组排序
 * @param array $array
 * @param $sortKey
 * @param string $sortType
 * @return array
 */
function multiArrSort(array $array, $sortKey, $sortType = 'ASC') {
    if (!is_array($array) || empty($array)) {
        return array();
    }

    if (!in_array($sortType, array('DESC', 'ASC'))) {
        return array();
    }

    $keyInfo = array_column($array, $sortKey);
    if (!$keyInfo || empty($keyInfo)) {
        return $array;
    }

    $newArray = array();
    foreach ($array as $key => $val) {
        $temp       = array(
            'key' => $key,
            'val' => $val
        );
        $newArray[] = $temp;
        unset($temp);
    }
    unset($array);
    $data = array();
    if ($sortType == 'DESC') {
        arsort($keyInfo);
        foreach ($keyInfo as $key => $value) {
            $data[$newArray[$key]['key']] = $newArray[$key]['val'];
        }
    } else {
        asort($keyInfo);
        foreach ($keyInfo as $key => $value) {
            $data[$newArray[$key]['key']] = $newArray[$key]['val'];
        }
    }

    return $data;
}
