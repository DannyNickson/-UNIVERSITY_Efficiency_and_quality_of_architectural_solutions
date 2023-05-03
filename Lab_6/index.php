<?php

interface Visitor {
    public function visitCompany(Company $company);
    public function visitDepartment(Department $department);
    public function visitEmployee(Employee $employee);
}

class Company {
    private $name;
    private $departments = [];

    public function __construct($name, $departments) {
        $this->name = $name;
        $this->departments = $departments;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitCompany($this);
        foreach ($this->departments as $department) {
            $department->accept($visitor);
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getDepartments() {
        return $this->departments;
    }
}

class Department {
    private $name;
    private $employees = [];

    public function __construct($name, $employees) {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitDepartment($this);
        foreach ($this->employees as $employee) {
            $employee->accept($visitor);
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getEmployees() {
        return $this->employees;
    }
}

class Employee {
    private $position;
    private $salary;

    public function __construct($position, $salary) {
        $this->position = $position;
        $this->salary = $salary;
    }

    public function accept(Visitor $visitor) {
        $visitor->visitEmployee($this);
    }

    public function getPosition() {
        return $this->position;
    }

    public function getSalary() {
        return $this->salary;
    }
}

class Report implements Visitor {
    private $reportData = [];

    public function visitCompany(Company $company) {
        $this->reportData[] = "Отчет для компании: " . $company->getName();
    }

    public function visitDepartment(Department $department) {
        $this->reportData[] = "Отчет для департамента: " . $department->getName();
    }

    public function visitEmployee(Employee $employee) {
        $this->reportData[] = "Позиция: " . $employee->getPosition() . ", Зарплата: " . $employee->getSalary();
    }

    public function getReportData() {
        return implode("\n", $this->reportData);
    }
}
