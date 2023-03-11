<?php
    require 'Components/header.php';
    echo '<h1>This is feedback list</h1>';
    include './Configuration/database.php';
    $sql = 'SELECT  * FROM feedback;';
        if($connection != null){
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        $feedbacks = $statement->fetchAll();
        echo '<ul class="list-group">';
        foreach ($feedbacks as $feedback){
            $name = isset($feedback['NAME']) ? $feedback['NAME'] : '';
            $email = isset($feedback['EMAIL']) ? $feedback['EMAIL'] : '';
            $body = isset($feedback['BODY']) ? $feedback['BODY'] : '';
            echo "<li class='list-group-item'>";
            echo "<p>$name</p>";
            echo "<p>$email</p>";
            echo "<p>$body</p>";
            echo "</li>";
        }
    }
    include 'Components/footer.php';
?>
