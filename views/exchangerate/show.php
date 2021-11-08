
<div class='box'>
    <form class="field" name=Currency method="POST" action="">
        <label class='label'>
            Choose the currencys you want to exchange:
        </label>
        <select name='firstcurr'>
            <option value="">
                Choose...
            </option>
            <?php
                foreach($currencies as $currencie){
                    echo "<option value='$currencie'> ".$currencie. "</option>";
                }
            ?>
        </select>
        -
        <select  name='secondcurr'>
            <option value="">
                Choose...
            </option>
            <?php
                foreach($currencies as $currencie){
                    echo "<option value='$currencie'> ".$currencie. "</option>";
                }
            ?>
        </select>

        <br>
        <br>

        <label class='label'>
            Choose the date:
        </label>

        <input type="date" id="date" name="date" value="2021-01-01" >

        <br>
        <br>

        <label class='label'>
            If you want to see the whole month check the box:
        </label>
        <input type='checkbox' id='month' name='month'>
        <br>
        <br>
        <input class='button' type="submit" value="Submit" name=exchangesubmit>
    </form>

</div>

<?php 

    if(isset($_POST['firstcurr']) && isset($_POST['secondcurr']) && isset($_POST['date']) && $_POST['firstcurr']!='' 
        && $_POST['secondcurr']!='' && ($_POST['date']>=$firstDate && $_POST['date']<=$lastDate)){

        if(isset($_POST['month'])){
            $date = $_POST['date'];
            $firstcurr = $_POST['firstcurr'];
            $secondcurr = $_POST['secondcurr'];

            $data = $this->exchangeMonth($firstcurr, $secondcurr, $date);
            var_dump($data);
        }
        else{
            $date = $_POST['date'];
            $firstcurr = $_POST['firstcurr'];
            $secondcurr = $_POST['secondcurr'];  
            
            
            $data = $this->exchange($firstcurr, $secondcurr, $date);
            
            echo "<div class='box'>
                    <p>
                        In ".$_POST['date']." <strong>1</strong> ".$_POST['firstcurr']." was ".number_format($data, 9, '.')." ".$_POST['secondcurr']."
                    </p>
                </div>";
        }        
    }else{
        echo "Please give correct input!";
    }
?>