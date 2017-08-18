<br>
<div class="row">
    <form name="<?= "form_" . $row['id'] ?>" action="/admin/action" method="post">

                <input 
                    type="hidden" 
                    class="form-control" 
                    value="<?= $row['id'] ?>" 
                    name="id"
                />

            <div class="col-md-1">
                <?= $row['name'] ?>
            </div>
            <div class="col-md-1">
                <?= $row['email'] ?>
            </div>
            <div class="col-md-4">
                <textarea 
                    name="message" 
                    class="form-control" 
                    cols=50, 
                    rows=15
                ><?= $row['message'] ?></textarea>
            </div>
            <div class="col-md-1">
                <img height="100" width="100" src="<?= "/img/" . $row['img'] ?>"/>
            </div>
            <div class="col-md-1">
                <select class="form-control" name="isDone">
                    <option 
                        value="0" 
                        <?= 
                            $row["isDone"] == "0" ? 'selected="selected"' : "" 
                        ?>
                    >Не выполено</option>
                    <option 
                        value="1" 
                        <?= 
                            $row["isDone"] == "1" ? 'selected="selected"' :"" 
                        ?>
                    >Выполнено</option>
                </select>
            </div>
            <input type="submit" class="btn btn-default" name="save" value="Сохранить"/>

            <input type="submit" class="btn btn-default" name="delete" value="Удалить"/>
    </form>
</div>

<br>
<br>