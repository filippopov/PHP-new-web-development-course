
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
        <input disabled="disabled" type="text" id="result" value="<?php echo $result ?>">
    </div>
    <div>
        <input type="submit" name="calc" value="Submit">
    </div>

</form>