<?php

class Page
{
  public $id;
  public $title;
  public $content;

  private $connection;

  function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function findById($id)
  {
    $sql = 'SELECT * FROM pages WHERE id = :id';
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $pageData = $statement->fetch(PDO::FETCH_ASSOC);


    $this->id = $pageData['id'];
    $this->title = $pageData['title'];
    $this->content = $pageData['content'];
  }
}
