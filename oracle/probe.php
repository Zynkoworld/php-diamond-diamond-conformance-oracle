<?php

declare(strict_types=1);

function diamond($limit)
{
    $alphabet = range('A', $limit);
    $rows     = count($alphabet);
    $columns  = $rows * 2 - 1;

    return array_merge(
        array_map(
            function ($l, $a) use ($columns, $rows) {
                $row = str_repeat(' ', $columns);
                $row[$rows - 1 - $l] = $a;
                $row[$rows - 1 + $l] = $a;
                return $row;
            },
            array_keys($alphabet),
            $alphabet
        ),
        array_map(
            function ($l, $a) use ($columns, $rows) {
                $row = str_repeat(' ', $columns);
                $row[$rows - 1 - $l] = $a;
                $row[$rows - 1 + $l] = $a;
                return $row;
            },
            array_reverse(array_keys(array_slice($alphabet, 0, -1))),
            array_reverse(array_slice($alphabet, 0, -1))
        )
    );
}

$__in = json_decode('["A", "B", "C", "D", "Z"]', true);
$__out = [];
foreach ($__in as $x) {
  try { $__out[] = ["ok" => true, "v" => diamond($x)]; }
  catch (\Throwable $e) { $__out[] = ["ok" => false, "e" => get_class($e)]; }
}
echo json_encode(["out" => $__out]);
