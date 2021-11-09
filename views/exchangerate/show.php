
<div class='box' id='exfrom'>
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
        <input class='button' type="submit" value="Submit"  id="exchangesubmit">
    </form>

</div>

<?php 

    if(isset($_POST['firstcurr']) && isset($_POST['secondcurr']) && isset($_POST['date']) && $_POST['firstcurr']!='' 
        && $_POST['secondcurr']!='' && ($_POST['date']>=$firstDate && $_POST['date']<=$lastDate)){

        if(isset($_POST['month'])){
            $date = $_POST['date'];
            $firstcurr = $_POST['firstcurr'];
            $secondcurr = $_POST['secondcurr'];

            $datas = $this->exchangeMonth($firstcurr, $secondcurr, $date);
            //print_r($datas);
            ?>

            <table class="table" id="exchange" name="exchange">
                <tr>
                    <th>Currency</th>
                    <th>Date</th>
                    <th>Value</th>
                </tr>
                <?php
                    foreach($datas as $data){
                        foreach($data as $key =>$value)
                            echo "<tr><td>".$_POST['firstcurr']." - ".$_POST['secondcurr']."</td><td>".$key."<td/><td>".$value."</td></tr>";
                        
                    }
                ?>

            </table>
        <?php
        }
        else{
            $date = $_POST['date'];
            $firstcurr = $_POST['firstcurr'];
            $secondcurr = $_POST['secondcurr'];  

            $data = $this->exchange($firstcurr, $secondcurr, $date);
            if($data === 'empty'){
                echo "<strong class='box'>No rate was recorded on this day!</strong>";
            }
            else{
            echo "<div class='box'>
                    <p>
                        In ".$_POST['date']." <strong>1</strong> ".$_POST['firstcurr']." was ".number_format($data, 9, '.')." ".$_POST['secondcurr']."
                    </p>
                </div>";
            }
        }        
    }else{
        echo "<strong class='box'>Please give correct input!</strong>";
    }
?>
<canvas id="myChart" width="400" height="400"></canvas>

<script> 

const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [<?php implode(",",$datas['']) ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
 

//scr="js/chart.js";
</script>