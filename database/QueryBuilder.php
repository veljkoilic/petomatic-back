<?php
namespace App\Database;
/**
 * Class QueryBuilder - it makes queries to database
 */
class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

  public function addNew($table, $payload){
    var_dump($payload);
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
      $table,
      implode(", ", array_keys($payload)),
      ":" . implode(", :", array_keys($payload))
    );
    echo $sql;
    $query = $this->pdo->prepare($sql);
    if (($query->execute($payload)) === 1){
      echo json_encode("Client successfully created");
    }
  }

  public function getAllClients($table, $model = "")
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table}");
    $query->execute();

    if($model) {
      return $query->fetchAll(\PDO::FETCH_CLASS, $model);
    } else {
      return $query->fetchAll(\PDO::FETCH_OBJ);
    }
  }

  public function getOneClient($table, $id)
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
    $query->execute();
    return $query->fetch(\PDO::FETCH_OBJ);

  }

  public function getOneStaff($table, $email)
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE email = '{$email}'");
    $query->execute();
    return $query->fetch(\PDO::FETCH_OBJ);

  }

//  VUE STUFF IS ABOVE




















    public function getAllTrainings($table)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}
        INNER JOIN exercises_trainings ON trainings.id = exercises_trainings.training_id
        INNER JOIN trainings_users ON trainings.id = trainings_users.training_id INNER JOIN exercises ON exercises.id = exercises_trainings.exercise_id");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getOneTraining($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}
        INNER JOIN exercises_trainings ON trainings.id = exercises_trainings.training_id
        INNER JOIN trainings_users ON trainings.id = trainings_users.training_id INNER JOIN exercises ON exercises.id = exercises_trainings.exercise_id WHERE trainings.id = $id ");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);

    }
    public function getUserTrainings($table, $user_id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}
        INNER JOIN exercises_trainings ON trainings.id = exercises_trainings.training_id
        INNER JOIN trainings_users ON trainings.id = trainings_users.training_id INNER JOIN exercises ON exercises.id = exercises_trainings.exercise_id WHERE trainings_users.user_id = $user_id ");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);

    }

    public function getOneUserTraining($table, $user_id, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}
        INNER JOIN exercises_trainings ON trainings.id = exercises_trainings.training_id
        INNER JOIN trainings_users ON trainings.id = trainings_users.training_id INNER JOIN exercises ON exercises.id = exercises_trainings.exercise_id WHERE trainings_users.user_id = $user_id AND trainings.id = $id");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);

    }



    public function addNewTraining($table, $payload)
    {
        $sql="INSERT INTO $table (training_name, difficulties_id ) VALUES ('{$payload["training_name"]}', {$payload["difficulties_id"]})";
        $query = $this->pdo->prepare($sql);
        $query->execute($payload);

    }
    public function connectTrainingAndExercise($table, $payload)
    {
        $sql="INSERT INTO $table (exercise_id) VALUES ({$payload['exercise_id']}) INSERT INTO $table (training_id) (MAX(training_id)+1)";
        echo $sql;
        $query = $this->pdo->prepare($sql);
        $query->execute($payload);

    }

    public function update($table, $payload)
    {
        $id = $_POST['id'];
        unset($_POST['id']);

        $variables = "";
        foreach($_POST as $key =>  $element) {
             $variables.= $key . "='" . $element . "', ";
        }
        $variables = substr($variables, 0, -2);
        $sql = "UPDATE {$table} SET {$variables} WHERE id = '{$id}'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
    }

    public function getOneUser($table, $email, $model = "")
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE email='{$email}'");
        $query->execute();

        if($model) {
            return $query->fetch(\PDO::FETCH_CLASS, $model);
        } else {
            return $query->fetch(\PDO::FETCH_OBJ);
        }
    }

    public function destroy($table, $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$table} WHERE id='{$id}'");
        $query->execute();
    }
}
