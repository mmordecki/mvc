<?php

/*
echo "HEllo<br />\n";
var_dump($data);
echo $jeden;
*/

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Nazwa waluty</th><th>Kod waluty</th><th>Wartosc kursu</th></tr>";
foreach($currencyData as $data) {
    echo "<tr>";
    echo "<td>{$data['id']}</td>";
    echo "<td>{$data['name']}</td>";
    echo "<td>{$data['currency_code']}</td>";
    echo "<td>{$data['exchange_rate']}</td>";
    echo "</tr>";
}
echo "</table>";