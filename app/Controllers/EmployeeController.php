<?php

namespace App\Controllers;

use App\Models\Employee;
use App\Models\JobPosition;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeController extends BaseController
{
    public function index()
    {
        $employeeModel = new Employee();
        $data['employees'] = $employeeModel->findAll();
        
        return view('employees/index', $data);
    }

    public function create()
    {
        $jobPositionModel = new JobPosition();
        $data['job_positions'] = $jobPositionModel->findAll();

        return view('employees/create', $data);
    }

    public function store()
    {
        $employeeModel = new Employee();
        
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'job_position_id' => $this->request->getPost('job_position_id'),
            'salary' => $this->request->getPost('salary'),
            'date_of_employment' => $this->request->getPost('date_of_employment'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];
        
        $employeeModel->insert($data);
        
        return redirect()->to('/employees');
    }

    public function edit($id)
    {
        $employeeModel = new Employee();
        $jobPositionModel = new JobPosition();
        
        $data['employee'] = $employeeModel->find($id);
        $data['job_positions'] = $jobPositionModel->findAll();

        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $employeeModel = new Employee();
        
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'job_position_id' => $this->request->getPost('job_position_id'),
            'salary' => $this->request->getPost('salary'),
            'date_of_employment' => $this->request->getPost('date_of_employment'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];
        
        $employeeModel->update($id, $data);
        
        return redirect()->to('/employees');
    }

    public function delete($id)
    {
        $employeeModel = new Employee();
        $employeeModel->delete($id);
        
        return redirect()->to('/employees');
    }
}
