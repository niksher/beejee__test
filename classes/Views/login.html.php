<?php
?>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <h3 class="col-md-3 col-md-offset-5">Войти</h3>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-md-offset-5">
                <label for="login">Логин</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="login" 
                    placeholder="Введите логин"
                >
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-md-offset-5">
                <label for="password">Пароль</label>
                <input 
                    type="password" 
                    class="form-control" 
                    name="password" 
                    placeholder="Введите пароль"
                >
            </div>
        </div>
        <div class="row">
            <?PHP
                if ($data == "error") {
                    echo '<text class="col-md-3 col-md-offset-5"" style="color: red">Неверный логин/пароль</text>';
                }
            ?>
        </div>
        <button 
            type="submit" 
            class="btn btn-default col-md-3 col-md-offset-5" 
            name="Login"
        >Войти</button>
    </form>
</div>
