<div class="jumbotron">
    <h1><?php echo $title;  ?></h1>
    <form action="">
        <label>Выберите дату</label><br>
        <input type="text" class="datepicker" name="date" id="date">
        <input type="button" name="submitdate" id="submitdate" value="показать">
    </form>

    <div id="response">
        <?php require_once "currencydate.php"; ?>
    </div>

</div>