<?php

class DepartmentRepository extends DbRepository {
    public function getDepartmentModel() {
        $data = [
          "dept_id"   => "",
          "dept_name"   => ""
        ];
        return $data;
    }
    public function getAll() {
        $sql = "select * From department";
        return $this->fetchAll($sql);
    }
    public function insert($department) {
        $sql = "
          INSERT INTO department(dept_name)
            VALUES(:dept_name)
        ";
        $stmt = $this->execute($sql, $department);
    }
    public function getDepartmentByID($param) {
        $sql = "
            SELECT
              dept_id,dept_name
            FROM
              department
            WHERE dept_id = :dept_id
        ";
        return $this->fetch($sql, $param);
    }
    public function update($department) {
        $sql = "
            UPDATE department set
              dept_id = :dept_id,
              dept_name = :dept_name
            WHERE dept_id = :dept_id
        ";
        $stmt = $this->execute($sql, $department);
    }
    public function deleteDepartmentByID($param) {
      $sql = "
        DELETE FROM department
          WHERE dept_id = :dept_id
      ";
      $stmt = $this->execute($sql,$param);
      return $stmt->rowCount();
  }
}