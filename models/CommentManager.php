<?php
include_once "PDO.php";

function GetOneCommentFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment WHERE id = $id");
  return $response->fetch();
}

function GetAllComments()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment ORDER BY created_at ASC");
  return $response->fetchAll();
}

function GetAllCommentsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT comment.*, user.nickname "
      . "FROM comment LEFT JOIN user on (comment.user_id = user.id) "
      . "WHERE comment.user_id = $userId "
      . "ORDER BY comment.created_at ASC"
  );
  return $response->fetchAll();
}
function GetAllCommentsFromPostId($postId)
{
  global $PDO;
  $response = $PDO->query("SELECT p.content, u.nickname, p.created_at FROM post as p inner join user as u on u.id = p.user_id where p.id = $postId");
  return $response->fetchAll();
}
