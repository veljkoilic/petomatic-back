<?php require "views/partials/header.view.php" ?>
<?php
echo "<pre>";
var_dump($training);
echo "</pre>";
echo "<pre>";
var_dump($exercises);
echo "</pre>";

?>
<?php if(isset($training)): ?>
    <form action="/admin/products/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $training->id ?>">
<?php else: ?>
    <form action="/admin/trainings" method="POST" enctype="multipart/form-data">
<?php endif; ?>
<!--training_name || exercise_ids || < sets, reps || userid , exercise_name< duration-->
    <div class="form-group">
        <label for="training_name">Training name:</label>
        <input type="text" name="training_name" id="training_name" class="form-control" value="<?= isset($training[0]->training_name) ? $training[0]->training_name : '' ?>">
    </div>
    <input type="hidden" name="user_id" value="<?=$_SESSION['auth']->id?>">
    <div class="form-group">
        <label for="difficulty_id">Difficulty</label>
        <select name="difficulties_id" id="difficulties_id" class="form-control">
            <option value=""></option>
        <?php foreach ($difficulties as $difficulty): ?>
            <?php $selected = ($difficulty->id === $training[0]->difficulties_id) ? "selected" : "" ?>
            <option value="<?= $difficulty->id ?>" <?= $selected ?>><?= $difficulty->difficulty  ?></option>
        <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <?php foreach ($exercises as $exercise): ?>
            <?php
                $checked = "";
                $index = 0;
                $i=0;
                if (isset($training)) {
                    for ($i = 0; $i < count($training); $i+= 1) {
                        $sets = $training[$i]->sets;
                        $reps = $training[$i]->reps;
                        if($exercise->id === $training[$i]->exercise_id){
                            $checked = "checked";
                        }
                    }
                }
            ?>


            <label for="<?=$exercise->exercise_name?>"><?=$exercise->exercise_name?></label>
            <input type="checkbox" name="exercise_id[]" value="<?= $exercise->id ?>" <?=isset($training) ? $checked : ""?>>
            <!--TODO: POVEZI OVA DVA POLJA SA exercises_tainings gde je exercise id isti kao iz checkboxa i gde je training id taj-->
            <input type="text" placeholder="Reps" value="<?= isset($training[$i]->reps) && $checked === "checked" ? $reps : '' ?>"><input type="text" placeholder="Sets" value="<?= isset($training[$i]->sets) && $checked === "checked" ? $sets : '' ?>">
            <input type="hidden" name="training_id" value="<?=isset($training[0]->training_id) ? $training[0]->training_id : '' ?>">

            <!--TODO:OBRISI OVO-->
            <?= "<br>"?>
        <?php endforeach; ?>
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= isset($product->description) ? $product->description : '' ?></textarea>
    </div>

    <div class="form-group">
        <?php if (isset($product)) : ?>
            <div>
                <img width="240" src="/storage/<?= $product->image ?>" alt="">
            </div>
        <?php endif; ?>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" value="">
    </div>

    <button class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>

</form>
<?php require "views/partials/footer.view.php" ?>
