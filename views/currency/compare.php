<h1><?php echo $title; ?></h1>

<label class="m30">Сравнение валюты </label>
<select name="from" id="from">
    <?php foreach ($listCurrency as $val): ?>
        <option value="<?=$val["CharCode"] ?>"><?=$val["Name"] ?></option>
    <?php endforeach; ?>
</select><br>

<label class="m30">Вид сравнения</label>
<select name="kind" id="kind">
    <option value="1">Один к одному</option>
    <option value="2">Один ко многим</option>
</select><br>

<label class="m30">С валютой</label>
<select name="to" id="to">
    <?php foreach ($listCurrency as $val): ?>
        <option value="<?=$val["CharCode"] ?>"><?=$val["Name"] ?></option>
    <?php endforeach; ?>
</select>

<label class="m30">Дата</label>
<input type="text" class="datepicker" name="date" id="date"><br>

<label class="m30">Итого</label>
<span id="amountto"></span> <br><br><br>


<input type="button" id="compareCurrency" value="Сравнить">

<div id="rcompare">

</div>