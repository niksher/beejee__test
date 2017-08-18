<div class="jumbotron text-center">
    <h1>Задачи</h1>
</div>
<div class="container">
    <form class="form-inline" name="sort_form" method="post">
        <div class="form-group">
            <label for="name">
                Сортировать:
            </label>
            <select class="form-control" name="option">
                <option 
                    value="Name" 
                >Имя</option>
                <option 
        <select class="form-control" name="sortType">
                <option 
                    value="1"
                >Asc</option>
                <option 
                    value="0"
                >Desc</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<div class="container">
    <?PHP
        foreach ($data as $row) {
            include "task.html.php";
        }
    ?>
</div>
<div class="container">
    <?PHP include_once 'paginator.html.php'; ?>
</div>

<?PHP
    include_once 'addTask.html.php';
?>
            value="Email"
                >Email</option>
                <option 
                    value="isDone"
                >Статус</option>
            </select>

            <select class="form-control" name="sortType">
                <option 
                    value="1"
                >Asc</option>
                <option 
                    value="0"
                >Desc</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<div class="container">
    <?PHP
        foreach ($data as $row) {
            include "task.html.php";
        }
    ?>
</div>
<div class="container">
    <?PHP include_once 'paginator.html.php'; ?>
</div>

<?PHP
    include_once 'addTask.html.php';
?>

