<?php

class DepartmentController extends Controller {
    protected $auth_actions = [];

    public function indexAction() {
        $departments = $this->db_manager->get('Department')->getAll();
        $message = $this->session->get("message");
        $this->session->remove("message");
        
        $data = [
            "departments" => $departments,
            "message"   => $message
        ];
        return $this->render($data);
    }

    public function newAction() {
        $department = $this->db_manager->get('Department')->getDepartmentModel();
        
        $errors = [];

        if($this->request->isPost()) {
            $keys = array_keys($department);
            foreach($keys as $key) {
                $department[$key] = $this->request->getPost($key);
            }
            $errors = $this->validate($department);
            if(count($errors) === 0) {
                unset($department["dept_id"]);
                $this->db_manager->get('Department')->insert($department);
                $this->session->set("message", "新規追加されました");
                return $this->redirect('/department/index');
            }
        }
        $data = [
            "department"    => $department,
            "errors"      => $errors
        ];
        return $this->render($data);
    }
    private function validate($department) {
        $errors = [];
        if(empty($department["dept_name"])) {
            $errors[] = "名前は必須です";
        }
        return $errors;
    }
    public function editAction() {
        $department = $this->db_manager->get('Department')->getDepartmentModel();
        $errors = [];
        if($this->request->isPost()) {
            $keys = array_keys($department);
            foreach($keys as $key) {
                $department[$key] = $this->request->getPost($key);
            }
            $errors = $this->validate($department);
            if(count($errors) === 0) {
                $this->db_manager->get('Department')->update($department);
                $this->session->set("message", "更新しました");
                return $this->redirect('/department/index');
            }
        } else {
            $param = [
                "dept_id" => $this->request->getGet("dept_id")
            ];
            $department = $this->db_manager->get("Department")->getDepartmentByID($param);
            if(!$department) {
                $this->session->set("message", "該当のデータはありません");
                return $this->redirect('/department/index');
            }
        }
        
        $data = [
            "department"    => $department,
            "errors"      => $errors
        ];
        return $this->render($data);
    }
    public function deleteAction() {
        $param = [
            "dept_id" => $this->request->getGet("dept_id")
        ];
        $rowCount = $this->db_manager->get("Department")->deleteDepartmentByID($param);
        $this->session->set("message", $rowCount . "件を削除しました");
        return $this->redirect('/department/index');
    }
}