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
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
      $table,
      implode(", ", array_keys($payload)),
      ":" . implode(", :", array_keys($payload))
    );
    $query = $this->pdo->prepare($sql);
    if ($query->execute($payload)){
      echo json_encode("Successfully created");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }
  public function addNewPet($table, $payload){
    $query = $this->pdo->prepare("INSERT INTO {$table} (pet_name, species, pet_photo, breed_id, clients_id) VALUES ('{$payload['pet_name']}', '{$payload['species']}', '{$payload['pet_photo']}', {$payload['breed_id']}, {$payload['clients_id']})");
    var_dump($query);
    if ($query->execute($payload)){
      echo json_encode("Successfully created");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }

  public function getAll($table, $model = "")
{
  $query = $this->pdo->prepare("SELECT * FROM {$table}");
  $query->execute();

  if($model) {
    return $query->fetchAll(\PDO::FETCH_CLASS, $model);
  } else {
    return $query->fetchAll(\PDO::FETCH_OBJ);
  }
}
  public function getAllVisitsToday($table, $date, $model = "")
  {
    $query = $this->pdo->prepare("SELECT date , breed_name, client_name, client_lastname, client_photo, diagnosis, long_description, pet_name, pet_photo, photo, short_description, species, staff_name, staff_lastname, type FROM {$table} LEFT JOIN clients ON visits.clients_id = clients.id LEFT JOIN pets ON pets.clients_id = clients.id LEFT JOIN breeds ON pets.breed_id = breeds.id LEFT JOIN staff ON visits.staff_id = staff.id LEFT JOIN types ON visits.type_id = types.id WHERE visits.date = '{$date}'");
    $query->execute();

    if($model) {
      return $query->fetchAll(\PDO::FETCH_CLASS, $model);
    } else {
      return $query->fetchAll(\PDO::FETCH_OBJ);
    }
  }

  public function getAllVisits($table, $model = "")
  {
    $query = $this->pdo->prepare("SELECT date , breed_name, client_name, client_lastname, client_photo, diagnosis, long_description, pet_name, pet_photo, photo, short_description, species, staff_name, staff_lastname, type FROM {$table} LEFT JOIN clients ON visits.clients_id = clients.id LEFT JOIN pets ON pets.clients_id = clients.id LEFT JOIN breeds ON pets.breed_id = breeds.id LEFT JOIN staff ON visits.staff_id = staff.id LEFT JOIN types ON visits.type_id = types.id");
    $query->execute();

    if($model) {
      return $query->fetchAll(\PDO::FETCH_CLASS, $model);
    } else {
      return $query->fetchAll(\PDO::FETCH_OBJ);
    }
  }

  public function getOne($table, $id)
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
    $query->execute();
    return $query->fetch(\PDO::FETCH_OBJ);

  }

  public function getClientsPets($table, $client_id)
  {
    $query = $this->pdo->prepare("SELECT pets.id, pet_name, pet_photo, species, breed_name  FROM {$table} LEFT JOIN breeds ON breed_id = breeds.id WHERE clients_id = {$client_id}");
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_OBJ);

  }

  public function getPetsVisits($table, $pet_id)
  {
    $query = $this->pdo->prepare("SELECT date, long_description, short_description, diagnosis, photo  FROM {$table} LEFT JOIN pets ON pet_id = pets.id WHERE pet_id = {$pet_id}");
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_OBJ);

  }

  public function getOneStaff($table, $email)
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE email = '{$email}'");
    $query->execute();
    return $query->fetch(\PDO::FETCH_OBJ);

  }
  public function editClient($table, $payload){
  $query = $this->pdo->prepare("UPDATE {$table} SET client_name = '{$payload['client_name']}', client_lastname = '{$payload['client_lastname']}', client_photo = '{$payload['client_photo']}' WHERE id = {$payload['id']} ");
  if ($query->execute($payload)){
    echo json_encode("Successfully updated");
  }else{
    echo "<br> Error: Database not updated";
    var_dump($query->errorInfo());
  }
}
  public function editPet($table, $payload){
    $query = $this->pdo->prepare("UPDATE {$table} SET pet_name = '{$payload['pet_name']}', species = '{$payload['species']}', pet_photo = '{$payload['client_photo']}' WHERE id = {$payload['id']} ");
    if ($query->execute($payload)){
      echo json_encode("Successfully updated");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
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
