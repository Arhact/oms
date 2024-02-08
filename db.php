<?

class Editdb {
    // св-ва
    public $action;
    public $db_data;

    // методы
    public function select_method($action) {
        $actions_list = [
            ['delete', 'del'],
            ['update', 'upd'],
            ['clear', 0],
            ['fill', 1],
        ];
        

        if (in_array($action, $actions_list[0])) {

        }
        elseif (in_array($action, $actions_list[1])) {

        }
        elseif (in_array($action, $actions_list[2])) {

        }
        elseif (in_array($action, $actions_list[3])) {

        }
    }

}

