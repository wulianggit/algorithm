<?php
declare(strict_types=1);

namespace Sort\PHP\contract;

interface SortInterface
{
    /**
     * 执行排序
     *
     * @param array $sortArr
     *
     * @return array
     */
     public function execute(array $sortArr): array;
}
