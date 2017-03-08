<?php

include 'database.php';
class posts{
    public function addPost($conn, $title, $body){
        try
        {
            $stmtSQL = $conn->prepare("SELECT * FROM posts WHERE title=:title ");
            $stmtSQL->execute(array(':title'=>$title));
            $row=$stmtSQL->fetch(PDO::FETCH_ASSOC);
            if ($row['title']!=$title){
                $stmt = $conn->prepare("INSERT INTO posts (title, body) VALUES (:title, :body) ");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':body', $body);
                $stmt->execute();
                return $stmt; 
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }    
    } 
}
?>