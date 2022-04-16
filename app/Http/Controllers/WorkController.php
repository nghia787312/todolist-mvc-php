<?php
namespace App\Http\Controllers;

use App\Http\Models\WorkModel;

class WorkController
{
    private $workModel;
    
    /**
     * WorkController constructor.
     */
    public function __construct()
    {
        $this->workModel = new WorkModel();
    }
    
    /**
     * Show calendar
     */
    public function index()
    {
        $works = $this->workModel->all();
        $events = [];
        
        if (count($works) > 0) {
            foreach ($works as $work) {
                $events[] = $this->handleEventWorkCalendar($work);
            }
        }

        return view('work.index', $events);
    }
    
    /**
     *Show page create work
     */
    public function showCreate()
    {
        return view('work.add');
    }
    
    /**
     *Show page edit work
     */
    public function showEdit()
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            redirectHome();
        }

        $work = $this->workModel->all(['id' => $_GET['id']]);
        
        if (empty($work)) {
            redirectHome();
            
            return false;
        }
        
        return view('work.edit', reset($work));
    }
    
    /**
     *Handle create work
     */
    public function create()
    {
        $validate = $this->validate($_POST);
        
        if ($validate) {
            return view('work.add');
        }
        
        $insert = $this->workModel->insert($_POST);
        $status = $insert ? ACTION_STATUS_SUCCESS : ACTION_STATUS_FAILED;
        $this->setSessionMsg($status);
        
        redirectBack();
        
        return true;
    }
    
    /**
     *Handle edit work
     */
    public function edit()
    {
        $id = $_GET['id'];
        $validate = $this->validate($_POST);

        if ($validate) {
             redirectBack();
             
             return false;
        }

        $update = $this->workModel->update($_POST, $id);
        $status = $update ? ACTION_STATUS_SUCCESS : ACTION_STATUS_FAILED;
        $this->setSessionMsg($status);
        
        redirectBack();
        
        return true;
    }
    
    /**
     *Handle delete work
     */
    public function delete()
    {
        $id = $_GET['id'];

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            redirectHome();
            
            return false;
        }
        
        $delete = $this->workModel->delete($id);
        $status = $delete ? ACTION_STATUS_SUCCESS : ACTION_STATUS_FAILED;
        $this->setSessionMsg($status);
        
        redirectBack();
        
        return true;
    }
    
    /**
     * Set session message
     * 
     * @param $status
     */
    protected function setSessionMsg($status)
    {
        $message = $status === ACTION_STATUS_SUCCESS ? 'Action success' : 'Action failed';
        $_SESSION[$status] = $message;
    }
    
    /**
     * Validate data
     * 
     * @param $data
     * @return bool
     */
    protected function validate($data)
    {
        if (empty($data)) {
            return true;
        }
        
        $errors = [];
        
        if (empty($data['name'])) {
            $errors[] = 'Work name is required';
        }
    
        if (empty($data['start_date'])) {
            $errors[] = 'Start date is required';
        }
    
        if (empty($data['end_date'])) {
            $errors[] = 'End date is required';
        }
        
        if (!empty($data['start_date'] && !empty($data['end_date']))) {
            $startDate = validateDate($data['start_date']);
            $endDate = validateDate($data['end_date']);
            $now = date("Y-m-d");
            
            if (!$startDate) {
                $errors[] = 'Invalid start date format';
            }
            if (!$endDate) {
                $errors[] = 'Invalid end date format';
            }
    
            if ($startDate && $endDate && $startDate > $endDate) {
                $errors[] = 'Start date cannot be greater than end date';
            }
            
            if ($startDate && $endDate && $startDate < $now && $endDate < $now) {
                $errors[] = 'Start date or End date cannot be greater than current date';
            }
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            
            return true;
        }
        
        return false;
    }
    
    /**
     * @param $work
     * @return array
     */
    private function handleEventWorkCalendar($work)
    {
        $title = $work['name'] . ' - ' . $this->workModel->getStatusText($work['status']);
        
        return [
            'id' => $work['id'],
            'title' => $title,
            'start' => date('Y-m-d', strtotime($work['start_date'])),
            'end' => date('Y-m-d', strtotime($work['end_date'])),
            'allDay' => true,
            'color' => $this->workModel->getColorStatus($work['status'])
        ];
    }
}