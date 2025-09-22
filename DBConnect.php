<?php 

Class MySQL{
    public $servername;
    public $username;
    public $password;
    public $database;

    public $conn;
    public $rows;

    // 1. 資料庫名稱寫錯
    // 2. 資料庫連線失敗

    public function __construct($database){

        $this->database = $database;

        switch($database){
            case '':
                $this->servername = '';
                $this->username = '';
                $this->password = '';
                break;
            case '':
                $this->servername = '';
                $this->username = '';
                $this->password = '';
                break;
            case '':
                $this->servername = '';
                $this->username = '';
                $this->password = '';
                break;
            default:
                echo '錯誤訊息';
                break;
        } 

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->password);

        if(mysqli_connect_errno() != 0){
            echo "資料庫連線失敗，代號:" . mysqli_connect_errno();
        }

    }

    public function query($Sql, $Params, $Types){

        $this->rows = array();

        $stmt = $this->conn->prepare($Sql);

        if (!$stmt){
            echo "SQL語法寫錯" . $this->conn->error;
            return false;
        }

        $bindParams = array();
        $bindParams[] = $Types; 

        foreach ($Params as $key => $value) {
            $bindParams[] = &$Params[$key];
        }

        call_user_func_array([$stmt, 'bind_param'], $bindParams);
        
        if($stmt->execute()){
            if (stripos(trim($Sql), 'SELECT') === 0) {
                while ($row = mysqli_fetch_assoc($stmt->get_result())){
                    $this->rows[] = $row;
                }
                return $this->rows;
            }else{
                return $stmt->affected_rows;
            }
        }else{
            echo "執行失敗" . $stmt->error;
            return false;
        }

    }
    
}


Class SQLServer{

}

?>