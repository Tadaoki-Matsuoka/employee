<?php

class EmployeeRepository extends DbRepository {
    public function getEmployeeModel() {
        $data = [
            "ID"        => "",
            "name"      => "",
            "age"       => "",
            "address"   => "",
            "dept_id"   => ""
        ];
        return $data;
    }
    public function getAll() {
        $sql = "
            SELECT
              e.ID,e.name, e.age, e.address, e.dept_id, d.dept_name
            FROM
              employee as e
            LEFT JOIN
              department as d
            ON
              e.dept_id = d.dept_id
            ORDER BY e.ID ASC
        ";
        return $this->fetchAll($sql);
    }
    public function insert($employee) {
        $sql = "
          INSERT INTO employee(name, age, address, dept_id)
            VALUES(:name, :age, :address, :dept_id)
        ";
        $stmt = $this->execute($sql, $employee);
    }
    public function getEmployeeByID($param) {
        $sql = "
            SELECT
              e.ID, e.name, e.age, e.address, e.dept_id, d.dept_name
            FROM
              employee as e
            LEFT JOIN
              department as d
            ON
              e.dept_id = d.dept_id
            WHERE
              e.ID = :ID
        ";
        return $this->fetch($sql, $param);
    }
    public function update($employee) {
        $sql = "
            UPDATE employee set
              name = :name,
              age = :age,
              address = :address,
              dept_id = :dept_id,
              updated_at = now()
            WHERE ID = :ID
        ";
        $stmt = $this->execute($sql, $employee);
    }
    public function deleteEmployeeByID($param) {
      $sql = "
        DELETE FROM employee
          WHERE ID = :ID
      ";
      $stmt = $this->execute($sql,$param);
      return $stmt->rowCount();
  }
}