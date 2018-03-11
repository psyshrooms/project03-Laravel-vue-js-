<!DOCTYPE html>
{{--
* Created by PhpStorm.
* User: ShadhiN
* Date: 3/11/2018
* Time: 11:15 AM
--}}

<html lang="en">
<head>
  <title>Chat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .my-scroller{
        overflow-y: scroll;
            height: 200px;
        }


    </style>
</head>
<body>


<div class="container">
  <div style="margin-top: 5%" id="app" class="row">

      <div class="list-group col-md-6 col-md-offset-3">
          <a href="#" class="text-center list-group-item list-group-item-action active">
             <dt> chat room </dt>
          </a><a href="#" class="text-center list-group-item list-group-item-warning">
              <kbd> chatting with MD Shadhin</kbd>
          </a>
                  <div class="row">
                      <div class="col-sm-4">
                          <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                          <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                          <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                          <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                          <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                      </div>
                      <div class="col-sm-8">
                          <ul v-chat-scroll  class="list-group my-scroller">
                          <message
                          v-for="value in chat.message "
                          :key="value.index"
                          color="success"
                          >
                              @{{ value }}
                          </message>
                          </ul>
                          <input v-model="message" @keyup.enter="send" type="text" class="form-control" placeholder="Type your message">

                      </div>
          </div>
      </div>
  </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
