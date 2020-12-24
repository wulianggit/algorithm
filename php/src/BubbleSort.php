<?php
declare(strict_types=1);

namespace Sort\PHP;

use Sort\PHP\contract\SortInterface;

/**
 * 冒泡排序
 *
 * Class BubbleSort
 *
 * @package Sort\PHP
 */
class BubbleSort implements SortInterface
{
    public function execute(array $sortArr): array
    {
        $len = count($sortArr);
        for ($i = 1; $i < $len; $i++) {
            // 每次相邻两个元素比较，然后做交换
            for ($j = 0; $j < $len - $i; $j++) {
                if ($sortArr[$j+1] < $sortArr[$j]) {
                    swap($sortArr, $j, $j + 1);
                }
            }
        }

        return $sortArr;
    }
}
