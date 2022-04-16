<?php

namespace Tests;

use App\Http\Models\WorkModel;
use PHPUnit\Framework\TestCase;

class WorksControllerTest extends TestCase
{
    protected $workModel;
    
    /**
     * WorksControllerTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->workModel = new WorkModel();
    }
    
    /**
     *Test get all data
     */
    public function testGetAllEventWorkSuccess()
    {
        $works = $this->workModel->all();

        $this->assertIsArray($works, "get failed");
    }
    
    /**
     *Test add event work
     */
    public function testAddEventWorkSuccess()
    {
        $data = [
          'name' => 'Test add event work',
          'start_date' => '2023-02-02',
          'end_date' => '2023-04-04',
          'status' => 1  
        ];
        
        $works = $this->workModel->insert($data);
        
        $this->assertTrue($works, "insert failed");
    }
    
    /**
     *Test update event work
     */
    public function testUpdateEventWorkSuccess()
    {
        $data = [
            'name' => 'Test add event work',
            'start_date' => '2023-02-02',
            'end_date' => '2023-04-04',
            'status' => 1
        ];
        
        $works = $this->workModel->update($data, 1);
        
        $this->assertTrue($works, "Update failed");
    }
    
    /**
     *Test delete event work success
     */
    public function testDeleteEventWorkSuccess()
    {
        $works = $this->workModel->delete(1);
        
        $this->assertTrue($works, "Delete failed");
    }
    
    /**
     *Test delete event work fail
     */
    public function testDeleteEventWorkFail()
    {
        $works = $this->workModel->delete([]);
        
        $this->assertFalse($works, "Delete failed");
    }
}