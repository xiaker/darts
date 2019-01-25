<?php

namespace Darts\Hex;

class Hex64
{
    const LETTERS = [
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => 'a',
        11 => 'b',
        12 => 'c',
        13 => 'd',
        14 => 'e',
        15 => 'f',
        16 => 'g',
        17 => 'h',
        18 => 'i',
        19 => 'j',
        20 => 'k',
        21 => 'l',
        22 => 'm',
        23 => 'n',
        24 => 'o',
        25 => 'p',
        26 => 'q',
        27 => 'r',
        28 => 's',
        29 => 't',
        30 => 'u',
        31 => 'v',
        32 => 'w',
        33 => 'x',
        34 => 'y',
        35 => 'z',
        36 => 'A',
        37 => 'B',
        38 => 'C',
        39 => 'D',
        40 => 'E',
        41 => 'F',
        42 => 'G',
        43 => 'H',
        44 => 'I',
        45 => 'J',
        46 => 'K',
        47 => 'L',
        48 => 'M',
        49 => 'N',
        50 => 'O',
        51 => 'P',
        52 => 'Q',
        53 => 'R',
        54 => 'S',
        55 => 'T',
        56 => 'U',
        57 => 'V',
        58 => 'W',
        59 => 'X',
        60 => 'Y',
        61 => 'Z',
        62 => '@',
        63 => '-',
    ];

    public static function encode(int $value): string
    {
        $hex64 = '';

        do {
            $hex64 = self::LETTERS[($value % 64)] . $hex64;
            $value /= 64;
        } while ($value >= 1);

        return $hex64;
    }

    public static function decode(string $value): int
    {
        $letters = array_flip(self::LETTERS);
        $hex10 = 0;
        $len = strlen($value);

        for ($i = 0; $i < $len; $i++) {
            $b = $letters[$value[$i]];

            if ($b === null) {
                return false;
            }

            $j = $len - $i - 1;
            $hex10 += ($j == 0 ? $b : (2 << (6 * $j - 1)) * $b);
        }

        return $hex10;
    }
}
