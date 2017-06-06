<?php

class api_db extends db
{
  public static function getNotes($limit = 10, $offset = 0, $order_by = 'created_at', $order_way = 'asc')
  {
    // create the SQL string for ORDER BY direction (ASC or DESC)
    switch(strtolower($order_way))
    {
      default:
      case 'asc': $order_way_sql = "ASC"; break;
      case 'desc': $order_way_sql = "DESC"; break;
    }

    // create the SQL string for ORDER BY clause
    switch($order_by)
    {
      default:
      case 'created_at':
        $order_by_sql = "ORDER BY `notes`.`created_at` ".$order_way_sql;
        break;
      case 'title':
        $order_by_sql = "ORDER BY `notes`.`title` ".$order_way_sql;
        break;
      case 'id':
        $order_by_sql = "ORDER BY `notes`.`id` ".$order_way_sql;
        break;
    }

    // write the query
    $query = "
      SELECT `notes`.*
      FROM `notes`
      WHERE 1
      ".$order_by_sql."
      LIMIT :offset, :limit
    ";

    // connect to database
    $pdo = static::getPDO();

    // prepare the query
    $statement = $pdo->prepare($query);

    // bind values of $limit and $offset
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);

    // execute the query and get the result
    $statement->execute();

    // set the type of objects that fetching should return
    $statement->setFetchMode(PDO::FETCH_CLASS, 'note');

    // return the result
    return $statement->fetchAll();
  }
}