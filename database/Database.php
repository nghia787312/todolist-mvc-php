<?php
namespace App\database;

use Exception;

class Database
{
    protected $database;
    protected $table;
    
    /**
     * Database constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $configs = include('config.php');
        $this->database = mysqli_connect($configs['host'], $configs['username'], '', $configs['dbname']);

        if (!$this->database) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();

            throw new Exception('Failed');
        }
    }
    
    /**
     * @param $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }
    
    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }
    
    /**
     * Remove all spaces of parameters
     *
     * @return  array
     */
    public function filterParameters($input, $allowedParams = array())
    {
        $trimData = [];
        
        foreach($input as $key => $value)
        {
            $value = preg_replace("/(^\s+)|(\s+$)/us", "", $value);
            $trimData[$key] = $value;
        }
        
        if (empty($allowedParams)) {
            return $trimData;
        }
        
        return array_intersect_key($trimData, array_flip($allowedParams));
    }
    
    /**
     * Handle action insert
     * 
     * @param array $data
     * @return bool
     */
    public function actionInsert($data = [])
    {
        if (count($data) <= 0) {
            return false;
        }
    
        $tableName = $this->getTable();
        $fields = array_keys($data);
        $values = array_values($data);
    
        $sql ="INSERT INTO $tableName (".implode(',',$fields).") VALUES ('" . implode("', '", $values) . "' )";
        $query = mysqli_query($this->database, $sql);

        if (!$query) {
            return false;
        } 
        
        return true;
    }
    
    /**
     * Handle action all
     * 
     * @param array $where
     * @return array
     */
    public function actionAll($where = [])
    {
        $sql = "SELECT * FROM $this->table ";
        
        if (!empty($where) && isset($where['id'])) {
            $id = $where['id'];
            $sql .= "WHERE id = $id";
        } 
        
        $query = mysqli_query($this->database, $sql);
    
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
    
    /**
     * Handle action update
     * 
     * @param array $data
     * @param null $id
     * @return bool
     */
    public function actionUpdate($data = [], $id = null)
    {
        if (count($data) <= 0) {
            return false;
        }
        
        $tableName = $this->getTable();
    
        $set = '';
        $i = 1;
    
        foreach ($data as $name => $value) {
            $set .= "{$name} = \"{$value}\"";
            
            if ($i < count($data)) {
                $set .= ',';
            }
            
            $i++;
        }
    
        $sql = "UPDATE {$tableName} SET {$set} WHERE id = {$id}";
        
        $query = mysqli_query($this->database, $sql);
        
        if (!$query) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Handle action delete
     * 
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        $tableName = $this->getTable();
        
        $sql = "DELETE FROM {$tableName} WHERE id = {$id}";

        $query = mysqli_query($this->database, $sql);
        
        if (!$query) {
            return false;
        }
        
        return true;
    }
}