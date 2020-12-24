<?php
declare(strict_types=1);

namespace Sort\PHP;

use Sort\PHP\contract\SortInterface;

/**
 * 归并排序
 * 将一个大的无序数组有序，我们可以把大的数组分成两个，然后对这两个数组分别进行排序，之后在把这两个数组合并成一个有序的数组。由于两个小的数组都是有序的，所以在合并的时候是很快的。
 * 通过递归的方式将大的数组一直分割，直到数组的大小为 1，此时只有一个元素，那么该数组就是有序的了，之后再把两个数组大小为1的合并成一个大小为2的，再把两个大小为2的合并成4的
 * 直到全部小的数组合并起来
 *
 * Class MergeSort
 *
 * @package Sort\PHP
 */
class MergeSort implements SortInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $sortArr): array
    {
        $len = count($sortArr);
        $this->mergeSort($sortArr,0, $len - 1);

        return $sortArr;
    }

    public function mergeSort(array &$arr, int $left, int $right)
    {
        // 当left = right 时，说明分解到了只有一个元素
        if ($left < $right) {
            // 找出中间位置
            $mid = intval(($left + $right) / 2);

            // 对左半部分数组进行排序
            $this->mergeSort($arr, $left, $mid);
            // 对右半部分数组进行排序
            $this->mergeSort($arr, $mid + 1, $right);

            // 合并已经排好序的两部分数组
            $this->mergeArr($arr, $left, $mid, $right);
        }
    }

    /**
     * 合并两个数组 $arr[$left， $mid]  $arr[$mid + 1, $right]
     *
     * @param array $arr
     * @param int   $left
     * @param int   $mid
     * @param int   $right
     */
    public function mergeArr(array &$arr, int $left, int $mid, int $right)
    {
        $tmpArr = [];
        $i = $left; // 左半部分数组起始
        $j = $mid + 1; // 右半部分数组起始

        // 左半部分数组还没循环结束 && 右半部分数组还没循环结束
        while ($i <= $mid && $j <= $right) {
            // 左半部分的元素和右半部分元素比较，那个元素小，将那个元素放入临时数组中
            if ($arr[$i] < $arr[$j]) {
                $tmpArr[] = $arr[$i++]; // 将小的元素放入临时数组，$i++ 表示继续向后循环
            } else {
                $tmpArr[] = $arr[$j++];
            }
        }

        // 假如左半部分数组还没循环结束，则将左半部分全部放入临时数组
        while ($i <= $mid) {
            $tmpArr[] = $arr[$i++];
        }

        // 假如右半部分数组还没循环结束，则将右半部分全部放入临时数组
        while ($j <= $right) {
            $tmpArr[] = $arr[$j++];
        }

        for ($k = 0; $k < count($tmpArr); $k++) {
            // 此处将临时数组复制到原数组时，需要注意原数组下标问题
            $arr[$left + $k] = $tmpArr[$k];
        }
    }
}
