<?php

$employees = [
    ["Employee" => "Employee 1" , "Base Pay" => 7.50, "Hours Worked" => 35],
    ["Employee" => "Employee 2" , "Base Pay" => 8.20, "Hours Worked" => 47],
    ["Employee" => "Employee 3" , "Base Pay" => 10.00, "Hours Worked" => 73],
];
function ComputeTotalPay(float $basePay, int $hoursWorked): float {
    if ($basePay < 8)
        return -2;
    if ($hoursWorked > 40){
        if($hoursWorked > 60)
            return -1;
        $overTime = $hoursWorked - 40;
        return ($hoursWorked * $basePay) + ($overTime * $basePay * 1.5);
    }
    return ($hoursWorked * $basePay);
}

function Main(array $employees){
    foreach ($employees as $employee) {
        $totalPay = ComputeTotalPay($employee["Base Pay"], $employee["Hours Worked"]);

        echo "Total pay to " . $employee["Employee"] . " : ".
            ($totalPay == -2? "Error (base pay is below minimum)":
        ($totalPay == -1? "Error (number of hours is greater than 60)": $totalPay)) .
        PHP_EOL;
    }
}
Main($employees);
