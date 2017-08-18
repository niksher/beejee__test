<div class="jumbotron text-center">
    <p>Добавить задачу:</p>
</div>

<script type="text/javascript" src="/view/js/script.js"></script>

<div class="container">
    <form method="post" enctype="multipart/form-data" name="taskForm">
        <div class="row">
            <div class="form-group col-md-3 col-md-offset-3">
                <label for="name">Имя</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="name" 
                    placeholder="Введите имя"
                >
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-md-offset-3">
                <label for="email">Email</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="email" 
                    placeholder="Введите email"
                >
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5 col-md-offset-3">
                <label for="review">Текст задачи</label>
                <textarea 
                    class="form-control" 
                    name="message" 
                    rows="4" 
                    placeholder="Текст задачи"
                ></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5 col-md-offset-3">
                <label for="img">Изображение</label>
                <input name="img" type="file" class="form-control-file">
            </div>
        </div>
        <button 
            type="submit" 
            class="btn btn-default" 
            name="upload"
            onclick="send()"
       >Отправить</button>

        <button 
            type="submit" 
            class="btn btn-default" 
            name="upload"
            onclick="preview()"
        >Предпросмотр</button>
    </form>
    <div id="result"></div>
</div>

