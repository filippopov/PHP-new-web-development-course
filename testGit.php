<form method="get">
    <div>
        <select name="operation" id="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>

    <div>
        <label for="number-one">Number One</label>
        <input type="number" id="number-one" name="numberOne">
    </div>
    <div>
        <label for="number-two">Number Two</label>
        <input name="numberTwo" type="number" id="number-two">
    </div>
    <div>
        <label for="result">Result: </label>
    <?php
        if (! empty($_GET) && isset($_GET['calc'])) {
            $operation = $_GET['operation'];
            $numberOne = (int) $_GET['numberOne'];
            $numberTwo = (int) $_GET['numberTwo'];
            if ($operation == 'sum') {
                renderOperation($numberOne + $numberTwo);
            } elseif ($operation == 'subtract') {
                renderOperation($numberOne - $numberTwo);
            }
        } else {
            renderOperation('');
        }

        function renderOperation($result)
        {
            echo "<input type='text' id='result' value='" . $result . "' disabled='disabled'>";
        }

    ?>
    </div>
    <div>
        <input type="submit" name="calc" value="Submit">
    </div>

</form>
<?php





// First Quest
//$operation = $argv[1];
//$validateOperation = [
//    'sum',
//    'subtract'
//];
//
//if (! in_array($operation, $validateOperation)) {
//    echo "== Invalid operation ==";
//    exit;
//}
//
//$numberOne = intval(fgets(STDIN));
//$numberTwo = intval(fgets(STDIN));
//
//
//
//if ($operation == 'sum') {
//    echo ' == ' . ($numberOne + $numberTwo);
//} elseif ($operation == 'subtract') {
//    echo ' == ' . ($numberOne - $numberTwo);
//}
