<?php

class Page extends Entity
{
  function __construct($connection)
  {
    $this->connection = $connection;
    $this->tableName = 'pages';
    $this->fields = [
      'id',
      'title',
      'content'
    ];
  }
}
