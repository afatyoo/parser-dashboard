<?php
$data = <<<CSV
A	B	C	D	F	G	H	I	J
292.5972	223.6696		293.2534	2.784007		291.4825	24.44976	
395.9462	359.7612		396.5938	6.727198		394.8337	79.28268	
399.2957	436.6656	340.0321	399.9346	8.118317	5.876507	398.1853	93.93782	65.89009
402.6456	494.1551		403.276	9.128724		401.5372	108.8389	
405.9959	507.8627		406.618	9.621089		404.8896	115.0518	
409.3466	518.1977	506.7385	409.9604	10.06906	9.606291	408.2424	117.0039	113.6315
412.6976	532.1565		413.3033	10.53447		411.5955	119.9036	
416.0491	537.6508		416.6466	10.85873		414.9489	121.7551	
419.4009	534.9668	534.9247	419.9905	11.03667	10.80996	418.3027	121.4142	121.0243
CSV;

$rows = explode("\n", trim($data));
$headers = explode("\t", array_shift($rows));
$result = [];

foreach ($rows as $index => $row) {
    $cols = explode("\t", $row);

    if (($index + 1) % 3 == 0) {
        $b1 = floatval(explode("\t", $rows[$index - 2])[1] ?? 0);
        $b2 = floatval(explode("\t", $rows[$index - 1])[1] ?? 0);
        $b3 = floatval($cols[1]);
        $cols[2] = number_format(($b1 + $b2 + $b3) / 3, 7, '.', '');
    }

    $result[] = $cols;
}

// Hitung K–P
$finalRows = [];
foreach ([2, 5, 8] as $rowIndex) {
    $row = $result[$rowIndex];

    $K = 400 + (($rowIndex - 2) / 3) * 10;
    $L = floatval($row[2]);
    $M = floatval($row[5]);
    $N = floatval($row[8]);

    $O = $M * 0.028 * $N;
    $P = $O / $N;

    $finalRows[] = [
        'K' => $K,
        'L' => round($L, 7),
        'M' => round($M, 6),
        'N' => round($N, 6),
        'O' => round($O, 6),
        'P' => round($P, 6)
    ];
}

// Tulis ke JSON
file_put_contents('data.json', json_encode($finalRows, JSON_PRETTY_PRINT));
