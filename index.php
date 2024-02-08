<?

include 'db.php';

$test_upd = new SqlRequest;
$test_upd->sql_data = [
    'fields'=>['id', 'id_org', 'squad'],
    'tables'=>['users', 'orgs'],
    'def'=>[['id_org','=',3,'AND',],['squad','!=',2,'OR',],],
];
print_r($test_upd->Select($test_upd->sql_data));













// мусор ------------------------------------------------------------------

// include 'db.php';
// $test_upd = new Edit;
// $test_upd->action = 'upd';
// $test_upd->db_data = 'upd';


// $sql_data = [
//     'statement'=>null,
//     // 'fields'=>[],
//     // 'fields'=>['one'],
//     // 'fields'=>['first', 'second', 'third'],
//     'def'=>[['id','=',3,'AND',],]
// ];


// print_r(SqlMergingValues($sql_data['fields'], $formatting='first'));
// print_r(SqlMergingDefinition($sql_data['def']));


// $sql_fields = '';
// $sql_fields_cnt = count($sql_data['fields']);

// switch ($sql_fields_cnt) {
//     case 0:
//         $sql_fields = '*';
//         break;
//     case 1:
//         $sql_fields = '`'.$sql_fields.$sql_data['fields'][0].'`';
//         break;
//     default:
//         for ($field=0; $field < $sql_fields_cnt; $field++) { 
//             $sql_fields = $sql_fields.'`'.$sql_data['fields'][$field].'`';
//             if ($field < $sql_fields_cnt-1) {
//                 $sql_fields = $sql_fields.', ';
//             }
//         }
//         break;
// }

// print_r($sql_fields.'/'.count($sql_data['fields']));


// print_r(PDO::getAvailableDrivers());