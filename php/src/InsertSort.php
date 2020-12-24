<?php
declare(strict_types=1);

namespace Sort\PHP;

use Sort\PHP\contract\SortInterface;

/**
 * 插入排序
 *
 * Class InsertSort
 *
 * @package Sort\PHP
 */
class InsertSort implements SortInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $sortArr): array
    {
        $len = count($sortArr);
        for ($i = 0; $i < $len; $i++) {
            $current = $sortArr[$i];
            // 拿当前位置的值跟之前的元素做比较
            // 如果小于，则将前面的元素后移挪出位置
            // 直到合适的位置，把当前比较的元素插进去
            for ($j = $i - 1; $j >= 0 && $sortArr[$j] > $current; $j--) {
                $sortArr[$j + 1] = $sortArr[$j];
            }

            $sortArr[$j + 1] = $current;
        }

        return $sortArr;
    }
}
