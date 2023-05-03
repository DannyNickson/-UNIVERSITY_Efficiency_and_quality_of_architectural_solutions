<?php
interface QueryBuilderInterface {
    public function select(string $table, array $columns): QueryBuilderInterface;
    public function where(string $column, string $operator, $value): QueryBuilderInterface;
    public function limit(int $limit): QueryBuilderInterface;
    public function getSQL(): string;
}

class PostgreSQLQueryBuilder implements QueryBuilderInterface {
    private $query;
    
    public function select(string $table, array $columns): QueryBuilderInterface {
        $this->query = "SELECT " . implode(",", $columns) . " FROM " . $table;
        return $this;
    }
    
    public function where(string $column, string $operator, $value): QueryBuilderInterface {
        $this->query .= " WHERE " . $column . " " . $operator . " " . $value;
        return $this;
    }
    
    public function limit(int $limit): QueryBuilderInterface {
        $this->query .= " LIMIT " . $limit;
        return $this;
    }
    
    public function getSQL(): string {
        return $this->query;
    }
}

class MySQLQueryBuilder implements QueryBuilderInterface {
    private $query;
    
    public function select(string $table, array $columns): QueryBuilderInterface {
        $this->query = "SELECT " . implode(",", $columns) . " FROM " . $table;
        return $this;
    }
    
    public function where(string $column, string $operator, $value): QueryBuilderInterface {
        $this->query .= " WHERE " . $column . " " . $operator . " " . $value;
        return $this;
    }
    
    public function limit(int $limit): QueryBuilderInterface {
        $this->query .= " LIMIT " . $limit;
        return $this;
    }
    
    public function getSQL(): string {
        return $this->query;
    }
}


$postgresQueryBuilder = new PostgreSQLQueryBuilder();
$sql = $postgresQueryBuilder->select("users", ["id", "name", "email"])
    ->where("name", "=", "John")
    ->limit(10)
    ->getSQL();

$mysqlQueryBuilder = new MySQLQueryBuilder();
$sql = $mysqlQueryBuilder->select("users", ["id", "name", "email"])
    ->where("name", "=", "John")
    ->limit(10)
    ->getSQL();
