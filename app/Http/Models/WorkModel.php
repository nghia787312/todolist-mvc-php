<?php
namespace App\Http\Models;

use App\database\Database;

class WorkModel extends Database
{
    protected $table = 'works';
    protected $fillable = [
        'name', 'start_date', 'end_date', 'status', 'active'
    ];
    
    /**
     * WorkModel constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTable($this->table);
    }
    
    /**
     * @param array $where
     * @return array|void
     */
    public function all($where = [])
    {
        try {
            return $this->actionAll($where);
        } catch (\Exception $exception) {
            return view('errors.500');
        }
    }
    
    /**
     * @param $data
     * @return bool
     */
    public function insert($data)
    {
        try {
            $data = $this->filterParameters($data, $this->fillable);

            return $this->actionInsert($data);
        } catch (\Exception $exception) {
            return false;
        }
    }
    
    /**
     * @param $data
     * @param $id
     * @return bool
     */
    public function update($data, $id)
    {
        try {
            $data = $this->filterParameters($data, $this->fillable);
            
            return $this->actionUpdate($data, $id);
        } catch (\Exception $exception) {
            return false;
        }
    }
    
    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        try {
            return $this->actionDelete($id);
        } catch (\Exception $exception) {
            return false;
        }
    }
    
    /**
     * @param $status
     * @return string
     */
    public function getStatusText($status)
    {
        switch ($status) {
            case WORK_STATUS_PLANING:
                return 'Planing';
            case WORK_STATUS_DOING:
                return 'Doing';
            case WORK_STATUS_COMPLETE:
                return 'Doing';
            default:
                return '';
        }
    }
    
    /**
     * @param $status
     * @return string
     */
    public function getColorStatus($status)
    {
        switch ($status) {
            case WORK_STATUS_PLANING:
                return '#FF69B4';
            case WORK_STATUS_DOING:
                return '#7B68EE';
            case WORK_STATUS_COMPLETE:
                return '#008000';
            default:
                return '#FFFFFF';
        }
    }
}