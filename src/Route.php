<?php

class Route extends Entity
{

  function __construct($connection)
  {
    $this->connection = $connection;
    $this->tableName = 'routes';
    $this->fields = [
      'id',
      'module',
      'action',
      'entity_id',
      'pretty_url'
    ];
  }
}
