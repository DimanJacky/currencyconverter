<h1><?php echo $title; ?></h1>

<label class="m30">У меня есть</label>
<select name="from" id="from">
    <?php foreach ($listCurrency as $val): ?>
        <option value="<?=$val["CharCode"] ?>"><?=$val["Name"] ?></option>
    <?php endforeach; ?>
</select>

<label class="m30">Количество</label>
<input type="text" name="amountfrom" id="amountfrom"><br>

<label class="m30">Хочу приобрести</label>
<select name="to" id="to">
    <?php foreach ($listCurrency as $val): ?>
        <option value="<?=$val["CharCode"] ?>"><?=$val["Name"] ?></option>
    <?php endforeach; ?>
</select>

<label class="m30">Дата</label>
<input type="text" class="datepicker" name="date" id="date"><br>

<label class="m30">Итого</label>
<span id="amountto"></span> <br><br><br>


<input type="button" id="convertCurrency" value="Конвертировать">