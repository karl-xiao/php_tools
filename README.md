# php_tools
一些PHP实用小方法
## multiArrSort
二维数组排序
```php
$testArr = array(
    'ab' => [
        'name' => 'ab',
        'age'  => 18
    ],
    'cd' => [
        'name' => 'cd',
        'age'  => 15
    ],
    'ef' => [
        'name' => 'ef',
        'age'  => 30
    ]
);

$data = multiArrSort($testArr, 'age', 'ASC');
```
得到新的数组为
array (size=3)  
  'cd' =>   
    array (size=2)  
      'name' => string 'cd' (length=2)  
      'age' => int 15  
  'ab' =>  
    array (size=2)  
      'name' => string 'ab' (length=2)  
      'age' => int 18  
  'ef' =>  
    array (size=2)  
      'name' => string 'ef' (length=2)  
      'age' => int 30  
