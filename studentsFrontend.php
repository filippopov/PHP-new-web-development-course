<?php if (! empty($error)) : ?>
    <h2><?php echo $error?></h2>
<?php endif; ?>


<form method="get">
    <div>
        Delimiter:
        <select name="delimiter">
            <?php foreach ($allowDelimiters as $allowDelimiter) :?>
                <option value="<?php echo $allowDelimiter ?>"><?php echo $allowDelimiter ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        Names:
        <input type="text" name="names">
    </div>
    <div>
        Ages:
        <input type="text" name="ages">
    </div>
    <div>
        Filter:
        <input type="submit" value="Filter" name="filter">
    </div>
</form>