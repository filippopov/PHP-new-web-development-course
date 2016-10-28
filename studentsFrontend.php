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

<?php if (! empty($dataWithPaging)) : ?>
    <table border="1">
        <thead>
        <tr>
            <th>
                Names
            </th>
            <th>
                Ages
            </th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < $counterWithPaging; $i++) :?>
            <tr>
                <td>
                    <?php echo $dataWithPaging[$i]['names']; ?>
                </td>
                <td>
                    <?php echo $dataWithPaging[$i]['ages']; ?>
                </td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
    <?php if ($hasPrevious) : ?>
        <a href="students.php?page=<?=$page - 1 ?>&<?=$urlData?>">[Previous]</a>
        <?php if (!$hasNext) : ?>
            <a href="students.php?page=<?=$page - 2 ?>&<?=$urlData?>">[<?= $page - 2 ?>]</a>
        <?php endif; ?>
        <a href="students.php?page=<?=$page - 1 ?>&<?=$urlData?>">[<?= $page - 1 ?>]</a>
    <?php endif; ?>
    <a style="color: red">[<?= $page ?>]</a>
    <?php if ($hasNext) : ?>
        <a href="students.php?page=<?=$page + 1 ?>&<?=$urlData?>">[<?= $page + 1 ?>]</a>
        <?php if (! $hasPrevious) : ?>
            <a href="students.php?page=<?=$page + 2 ?>&<?=$urlData?>">[<?= $page + 2 ?>]</a>
        <?php endif; ?>
        <a href="students.php?page=<?=$page + 1 ?>&<?=$urlData?>">[Next]</a>
    <?php endif; ?>
<?php endif; ?>


