<?php

class Entity
{
  protected $tableName;
  protected $fields;
  protected $connection;

  public function findBy($fieldName, $fieldValue)
  {
    $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . " = :value";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(":value", $fieldValue, PDO::PARAM_STR);
    $statement->execute();
    $pageData = $statement->fetch(PDO::FETCH_ASSOC);

    $this->setValues($pageData);
  }

  public function setValues($values)
  {
    foreach ($this->fields as $fieldName) {
      $this->$fieldName = $values[$fieldName];
    }
  }
}
