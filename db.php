<?
// создание списка параметров с заданным фрматированием
// пример = '`id_organization`, `squad`, `status`'
function SqlMergingValues($array, $formatting=null) {
    $var = '';
    $var_cnt = count($array);

    switch ($formatting) {
        case 'upper':
            for ($i=0; $i < $var_cnt; $i++) { 
                $array[$i] = strtoupper($array[$i]);
            }
            break;
        case 'lower':
            for ($i=0; $i < $var_cnt; $i++) { 
                $array[$i] = strtolower($array[$i]);
            }
            break;
        case 'first':
            for ($i=0; $i < $var_cnt; $i++) { 
                $array[$i] = ucfirst(strtolower($array[$i]));
            }
            break;
        default:
            break;
    }

    switch ($var_cnt) {
        case 0:
            $var = '*';
            break;
        case 1:
            $var = '`'.$array[0].'`';
            break;
        default:
            for ($i=0; $i < $var_cnt; $i++) { 
                $var = $var.'`'.$array[$i].'`';
                if ($i < $var_cnt-1) {
                    $var = $var.', ';
                }
            }
            break;
    }

    return($var);
}
// создание списка условий
// пример = ' WHERE `id_org` = ? AND `squad` > ?'
function SqlMergingDefinition($array) {
    $var = '';
    $var_cnt = count($array);

    switch ($var_cnt) {
        case 0:
            break;
        case 1:
            $var = ' WHERE `'.strtolower($array[0][0]).'` '.$array[0][1].' ?';
            
            break;
        default:
            $var = ' WHERE ';
            for ($i=0; $i < $var_cnt; $i++) { 
                $var = $var.'`'.strtolower($array[$i][0]).'` '.$array[$i][1].' ?';
                if ($i < $var_cnt-1) {
                    $var = $var.' '.$array[$i][3].' ';
                }
            }
            break;
    }
    return($var);
}

class SqlRequest {
    // св-ва
    public $action;
    public $db_data = [
        'host'=>null, 
        'name'=>null, 
        'login'=>null, 
        'password'=>null,
    ];
    public $sql_data = [
        'fields'=>[], // ['FIRST', 'Second', 'third',] или ['ZeRO',] или []
        'tables'=>[], // ['FIRST', 'Second', 'third',] или ['ZeRO',] или []
        'def'=>[], // [['id','=', 2, 'AND',],['status','=', 'test','OR',],] или [['id', '=', 1, ],] или []
    ];
    // $actions_list = ['select', 'insert', 'update', 'delete',];

    // методы
    
    // запрос в db, в процессе
    public function Request($db_data, $sql_request) {
        try { 
            $db = new PDO(
                'mysql:host='.$db_data['host'].';dbname='.$db_data['name'], 
                $db_data['login'], $db_data['password']
            );
        }
        catch (PDOException $e) {
            print "PDO error: " . $e->getMessage();
            die();
        }
    }

    // оператор select, ошибка в execute, в процессе
    public function Select($sql_data) {
        $fields = SqlMergingValues($sql_data['fields']);
        $tables = SqlMergingValues($sql_data['tables'], 'first');
        $definitions = SqlMergingDefinition($sql_data['def']);

        $stmt = 'SELECT '.$fields.' FROM '.$tables.$definitions;

        if (count($sql_data['def']) != 0) {
            for ($i=0; $i < count($sql_data['def']); $i++) {
                $var = $sql_data['def'][$i][2];
                // $stmt->execute([$var]);
            }
        }
        return($stmt);
    }

    // оператор insert, в процессе
    public function Insert() {
        // $stmt = $pdo->prepare("SELECT `name` FROM categories WHERE `id` = ?");
        // $stmt->execute([$id]);
    }

    // оператор update, в процессе
    public function Update() {
        // $stmt = $pdo->prepare("SELECT `name` FROM categories WHERE `id` = ?");
        // $stmt->execute([$id]);
    }
    
    // оператор delete, в процессе
    public function Delete() {
        // $stmt = $pdo->prepare("SELECT `name` FROM categories WHERE `id` = ?");
        // $stmt->execute([$id]);
    }

}
