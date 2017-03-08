<?php
include 'database.php';
class delete{
    public function deletePost($conn){
        try
        {
            $delete_id = $_POST['delete_id'];
            $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
            $stmt->bindParam(':id', $delete_id);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }    
    } 
}
$delete_posts= new delete();
?>