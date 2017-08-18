<div class="jumbotron text-center">
    <h1>Задачи</h1>
</div>
<div class="row">
    <div class="col-md-1">
        Имя
    </div>
    <div class="col-md-1">
        Email
    </div>
    <div class="col-md-4">
        Текст задачи
    </div>
    <div class="col-md-1">
        Изображение
    </div>
    <div class="col-md-1">
        Выполнено
    </div>
</div>

<?PHP

    foreach ($data as $row) {
        include "adminTask.html.php";
    }

