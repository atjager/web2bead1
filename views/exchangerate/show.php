<?php 
    //var_dump($firstDate);
    //var_dump($lastDate);
    
?>
<select>
    <option value="">
        Choose...
    </option>
    <?php
        foreach($currencies as $currencie){
            echo "<option value=''> ".$currencie. "</option>";
        }
    ?>
</select>

<select>
    <option value="">
        Choose...
    </option>
    <?php
        foreach($currencies as $currencie){
            echo "<option value=''> ".$currencie. "</option>";
        }
    ?>
</select>

<label for="start">Start date:</label>

<input type="date" id="start" name="trip-start"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">

<label for="last">Last date:</label>

<input type="date" id="last" name="trip-last"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">