<?php
declare(strict_types=1);

namespace Sort\PHP;

use Sort\PHP\contract\SortInterface;

/**
 * 选择排序
 *
 * Class SelectSort
 *
 * @package Sort\PHP
 */
class SelectSort implements SortInterface
{
    public function execute(array $sortArr):array
    {
        $len = count($sortArr);
        for ($i = 0; $i < $len - 1; $i++) {
            $minPos = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                // 拿当前位置的值跟已经得出最小值做比较
                $minPos = $sortArr[$j] < $sortArr[$minPos] ? $j : $minPos;
            }

            // 当最小值下标不等于$i时，说明有比当前位置更小的数，则需要交换
            if ($minPos != $i) {
                swap($sortArr, $i, $minPos);
            }
        }

        return $sortArr;
    }
}
