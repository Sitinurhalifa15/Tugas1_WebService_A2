<?php
error_reporting (E_ALL ^ E_WARNING||E_NOTICE);
$data=file_get_contents("https://ojk-invest-api.vercel.app/api/illegals");
$perusahaan_ojk=json_decode($data);
//echo "<pre>";print_r($perusahaan_ojk->data->illegals);
$table = "<h3>DATA PERUSAHAAN OJK</h3>";
$table .= "<table border=1>
			<tr><td>No</td>
			    <td>Nama PT</td>
				<td>Alamat</td>
				<td>Telephone</td>
				<td>Tipe</td>
				<td>Web</td></tr>";
for($i=0;$i<count($perusahaan_ojk->data->illegals);$i++){
    $no=$i+1;
    $table .= "<tr>
                <td>{$no}</td>
                <td>{$perusahaan_ojk->data->illegals[$i]->name}</td>
                <td>{$perusahaan_ojk->data->illegals[$i]->address}</td>
                <td>{$perusahaan_ojk->data->illegals[$i]->number[0]}</td>
                <td>{$perusahaan_ojk->data->illegals[$i]->type}</td>
                <td>{$perusahaan_ojk->data->illegals[$i]->urls[0]}</td>
                </tr>";
}
$table .= "</table>";
echo $table;