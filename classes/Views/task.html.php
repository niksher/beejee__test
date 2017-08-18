<div class="container">
    <br>
    <div class="row">
        <center>
            <div class="col-md-1">
                <?= $row["name"] ?>
            </div>
            <div class="col-md-1">
                <?= $row["email"] ?>
            </div>
            
            <div class="col-md-4">
                <?= $row["message"];?>
            </div>
            <div class="col-md-3">
                <img class="img-thumbnail" src="img/<?= $row["img"]?>"/>
            </div>
            <div class="col-md-1">
                <?= 
                    $row["isDone"] == 1  
                        ? '<text style="color: green">Закрыта</text>' 
                        : ""
                ?>
            </div>
        </center>
    </div>
    
    <br>
</div>