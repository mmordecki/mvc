<?php
use App\Helper\UrlManager;
/*
echo "HEllo<br />\n";
var_dump($data);
echo $jeden;
*/

echo " <a href='".UrlManager::to('/')."'>Strona główna</a> |";
echo " <a href='".UrlManager::to('o-mnie')."'>O mnie</a> |";
echo " <a href='".UrlManager::to('posts',['year' => 2004,'category' => "php"])."'>Post</a> |";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Nazwa waluty</th><th>Kod waluty</th><th>Wartosc kursu</th></tr>";
foreach($currencyData as $data) {
    echo "<tr>";
    echo "<td style='border: solid 1px black;'>{$data['id']}</td>";
    echo "<td style='border: solid 1px black;'>{$data['name']}</td>";
    echo "<td style='border: solid 1px black;'>{$data['currency_code']}</td>";
    echo "<td style='border: solid 1px black;'>{$data['exchange_rate']}</td>";
    echo "</tr>";
}
echo "</table>";