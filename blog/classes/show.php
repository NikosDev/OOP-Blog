<?php
include 'database.php';
class show{
    public function showPost($conn){
        try
        {
            $sql = "SELECT * FROM posts ORDER BY id DESC";
            $posts = $conn->query($sql);
            foreach ($posts as $row) { 
            echo "<div class='container'>";
                echo "<div class='card my-4'>";
                    echo "<div class='card-header'>";
                      echo $row["title"];
                    echo "</div>";
                    echo "<div class='card-block'>";
                        echo "<p class='card-text'>" . $row["body"] . "</p>";
                        echo  '<form method="post" action="', htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'), '" />';
                        echo  '<input type="hidden" name="delete_id" value="', htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'), '" />';
                        echo "<button type='submit' name='delete' class='btn btn-primary' value='Delete'> Delete</button> ";
                        echo  '</form>';
                    echo "</div>";
                echo "</div>";
            echo "</div>";

                
              
            } 
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }    
    } 
}
?>