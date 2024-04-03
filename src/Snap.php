<?php

declare(strict_types=1);

namespace Yggverse\YoTools;

class Snap
{
    public static function getTimeLast(array $files): int
    {
        $time = [];

        foreach ($files as $file)
        {
            if (!str_ends_with($file, '.tar.gz'))
            {
                continue;
            }

            $time[] = preg_replace(
                '/^([\d]+)\.tar\.gz$/',
                '$1',
                basename(
                    $file
                )
            );
        }

        if ($time)
        {
            return max(
                $time
            );
        }

        return 0;
    }
}