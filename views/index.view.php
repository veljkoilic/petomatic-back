<?php require "partials/header.view.php" ?>
        <pre>

<?php
    $i = 0;
    foreach ($trainings as $training){
        echo "<ul>";
        $i+=1;
        if ($training->id != $i-1){
            echo "<li>";
            echo"Name:" . $training->training_name;
            echo "</li>";

            echo "<li>";
            echo"Duration:" . $training->training_duration;
            echo "</li>";

            echo "<li>";
            echo"Difficulty:" . $training->difficulties_id;
            echo "</li>";

            echo "<li>";
            echo"Name:" . $training->exercise_name;
            echo "</li>";

            echo "<li>";
            echo"SETS:" . $training->sets;
            echo "</li>";

            echo "<li>";
            echo"REPS:" . $training->reps;
            echo "</li>";

        }else{
            echo "<li>";
            echo "Name:  $training->exercise_name";
            echo "</li>";

            echo "<li>";
            echo "REPS:  $training->reps";
            echo "</li>";

            echo "<li>";
            echo "SETS:  $training->sets";
                echo "</li>";
            echo "</br>";




            $i-=1;

        }
        echo "</ul>";

    }
?>
<?php require "partials/footer.view.php" ?>
