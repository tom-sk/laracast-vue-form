<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="root" class='container'>

        @include ('projects.list')   

           <form action="/projects" method='POST' @submit.prevent='onSubmit' @keydown='form.errors.clear($event.target.name)'>
                <div class="control">
                    <label for="name" class='label'>Project Name:</label>

                    <input type="text" id="name" name='name' class="input" v-model='form.name' @keydown='form.errors.clear("name")' >

                    <span class="help is-danger" v-if='form.errors.has("name")' v-text='form.errors.get("name")' ></span>
                </div>

                <div class="control">
                    <label for="description" class='label'>Project description:</label>

                    <input type="text" id="description" name='description' class="input" v-model='form.description' >

                    <span class="help is-danger"  v-if='form.errors.has("description")' v-text='form.errors.get("description")' ></span>
                </div>
                <div class="control">
                    <button class="button is-primary" :disabled='form.errors.any()' >Create</button>
                </div>
           </form>
        </div>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js' ></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.js' ></script>
        <script src='/js/app.js'></script>
    </body>
</html>