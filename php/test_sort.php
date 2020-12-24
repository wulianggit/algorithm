<?php
declare(strict_types=1);
include "./vendor/autoload.php";

use Sort\PHP\BubbleSort;
use Sort\PHP\InsertSort;
use Sort\PHP\MergeSort;
use Sort\PHP\SelectSort;
use function Sort\PHP\generate_sort_arr;
use function Sort\PHP\print_arr;

$sortArr = generate_sort_arr();
print_arr($sortArr, "排序前:");

// 1、选择排序算法
// $sortHandler = new SelectSort();
// 2、冒泡排序算法
// $sortHandler = new BubbleSort();
// 3、插入排序
// $sortHandler = new InsertSort();
// 4、归并排序
$sortHandler = new MergeSort();

$sortResult = $sortHandler->execute($sortArr);
print_arr($sortResult, "排序后:");
