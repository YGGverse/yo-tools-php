<?php

declare(strict_types=1);

namespace Yggverse\YoTools;

class Link
{
    public static function relative2absolute(
        string $source, // current document url to grab the base
        string $target, // relative or absolute link
        ?string &$scheme = null,
        ?string &$host = null,
        ?int &$port = null
    ): string
    {
        if (!parse_url($target, PHP_URL_HOST))
        {
            $scheme = parse_url($base, PHP_URL_SCHEME);
            $host   = parse_url($base, PHP_URL_HOST);
            $port   = parse_url($base, PHP_URL_PORT);

            return $scheme . '://' . $host . ($port ? ':' . $port : null) .
            '/' .
            trim(
                ltrim(
                    str_replace(
                        [
                            './',
                            '../'
                        ],
                        '',
                        $target
                    ),
                    '/'
                ),
                '.'
            );
        }

        return $target;
    }
}