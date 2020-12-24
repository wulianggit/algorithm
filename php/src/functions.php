<?php
declare(strict_types=1);

namespace Sort\PHP;

/**
 * 生成待排数组
 *
 * @param int $total
 *
 * @return array
 */
function generate_sort_arr(int $total = 10): array
{
    $sortArr = range(1, $total);
    shuffle($sortArr);

    return $sortArr;
}

/**
 * 将数组以空格分隔输出
 *
 * @param array  $arr
 * @param string $prefix
 */
function print_arr(array $arr, string $prefix = "")
{
    echo $prefix . implode(" ", $arr) .PHP_EOL;
}

/**
 * 交换数组中两个位置的值
 *
 * @param array $arr
 * @param int   $left
 * @param int   $right
 */
function swap(array &$arr, int $left, int $right)
{
    $tmp = $arr[$left];
    $arr[$left] = $arr[$right];
    $arr[$right] = $tmp;
}
