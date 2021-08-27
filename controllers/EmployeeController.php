<?php

class EmployeeController extends Controller {
    protected $auth_actions = [];

    public function indexAction() {
        $employees = $this->db_manager->get('Employee')->getAll();

        $message = $this->session->get("message");
        $this->session->remove("message");
        
        $data = [
            "employees" => $employees,
            "message"   => $message
        ];
        return $this->render($data);
    }

    public function newAction() {
        $employee = $this->db_manager->get('Employee')->getEmployeeModel();
        
        $errors = [];

        if($this->request->isPost()) {
            $keys = array_keys($employee);
            foreach($keys as $key) {
                $employee[$key] = $this->request->getPost($key);
            }
            $errors = $this->validate($employee, "insert");
            if(count($errors) === 0) {
                unset($employee["ID"]);
                $this->db_manager->get('Employee')->insert($employee);
                $this->session->set("message", "新規追加されました");
                return $this->redirect('/employee/index');
            }
        }
        $department = $this->db_manager->get('Department')->getAll();

        $data = [
            "employee"    => $employee,
            "department"  => $department,
            "errors"      => $errors
        ];
            return $this->render($data);
    }
    private function validate($employee, $action) {
        $errors = [];
        if($action == "update") {
            if(empty($employee["ID"])) {
                $errors[] = "IDは必須です";
            }
        }
        if(empty($employee["name"])) {
            $errors[] = "名前は必須です";
        }
        if(empty($employee["age"])) {
            $errors[] = "年齢は必須です";
        } else if(!is_numeric($employee["age"])) {
            $errors[] = "年齢は数値を入力してください";
        }
        if(empty($employee["dept_id"])) {
            $errors[] = "部署は必須です";
        } else if(empty($employee["dept_id"])) {
            $errors[] = "部署は数値を入力してください";
        }
        return $errors;
    }
    public function editAction() {
        $employee = $this->db_manager->get('Employee')->getEmployeeModel();

        $errors = [];

        if($this->request->isPost()) {
            $keys = array_keys($employee);
            foreach($keys as $key) {
                $employee[$key] = $this->request->getPost($key);
            }
            $errors = $this->validate($employee, "update");
            if(count($errors) === 0) {
                $this->db_manager->get('Employee')->update($employee);
                $this->session->set("message", "更新しました");
                return $this->redirect('/employee/index');
            }
        } else {
            $param = [
                "ID" => $this->request->getGet("ID")
            ];
            $employee = $this->db_manager->get("Employee")->getEmployeeByID($param);
            if(!$employee) {
                $this->session->set("message", "該当データはありません");
                return $this->redirect('/employee/index');
            }
        }
        $department = $this->db_manager->get('Department')->getAll();

        $data = [
            "employee"    => $employee,
            "department"  => $department,
            "errors"      => $errors
        ];
        return $this->render($data);
    }
    public function deleteAction() {
        $param = [
            "ID" => $this->request->getGet("ID")
        ];
        $rowCount = $this->db_manager->get("Employee")->deleteEmployeeByID($param);
        $this->session->set("message", $rowCount . "件を削除しました");
        return $this->redirect('/employee/index');
    }
}