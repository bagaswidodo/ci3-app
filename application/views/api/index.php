<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Demo JQUERY AJAX with REST api</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" media="screen" title="no title" charset="utf-8">
    <style media="screen">
      ul li .edit{
        display : none;
      }

      ul li.edit .edit{
        display : initial;
      }

      ul li.edit .noedit{
        display : none;
      }
    </style>
  </head>
  <body>
    <div class="container">


      <h1>Ajax user demo with REST API</h1>
      <ul id="users">
        <!-- user from REST here -->
      </ul>

      <!-- templating mustache -->
      <!-- html4 or IE -->
      <!-- <script type="text/template" id="user-template"> -->


      <!-- html5 -->
       <template id="user-template">
        <li data-id="{{id}}">
            <strong>Nama</strong>:<span class="noedit nama">{{nama}}</span>
            <input class="nama edit form-control">

            <strong> Email</strong> :<span class="noedit email">{{email}}</span>
            <input class="email edit form-control">


            <button data-id={{id}} class="remove btn btn-danger">X</button>
            <button class="editUser noedit btn btn-warning">Edit</button>
            <button class="saveEdit edit btn btn-default">Save</button>
            <button class="cancelEdit edit btn btn-default">Cancel</button>
        </li>
       </template>
      <!--  html5 -->
      <!-- </script> -->
      <!-- html4 or IE -->

      <hr>
      <h4>Tambahkan user</h4>
      <p>
        nama : <input type="text" id="nama" value="" class="form-control">
      </p>
      <p>
        email : <input type="email" id="email" value="" class="form-control">
      </p>
      <button id="add_user" class="btn btn-info">Tambahkan</button>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>">    </script>
    <script src="<?php echo base_url('assets/js/mustache.min.js'); ?>">     </script>
    <script type="text/javascript">
      $(function(){
          var $users = $('#users');
          var $nama = $('#nama');
          var $email = $('#email');

          //style one
        //  var userTemplate = "<li> Nama : {{ nama }}, Email : {{ email }}"+"<button data-id={{id}} class=remove>X</button></li>";
        var userTemplate = $('#user-template').html();
          function addUser(user)
          {
            //$users.append('<li>nama : '+ user.nama + ', email : '+ user.email +' [<a class="remove">x</a>]</li>');

            //using mustache
            $users.append(Mustache.render(userTemplate, user));
          }

          $.ajax({
              type:'GET',
              url:'<?php echo base_url('api/rest_db/demos'); ?>',
              success:function(users)
              {
                  $.each(users, function(i, user){
                      //soon using mustache JS
                      addUser(user);
                  });
              },
              error:function(){
                  alert('oops something wrong');
              },

          });

          $('#add_user').on('click',function(){
              var user = {
                  nama : $nama.val(),
                  email : $email.val(),
              };

              $.ajax({
                  type :'POST',
                  url:'<?php echo base_url('api/rest_db/demo'); ?>',
                  data:user,
                  success:function(newUser)
                  {
                      addUser(newUser);
                      console.log(newUser.nama);
                  },
                  error:function(){
                        alert('oops something wrong');
                  }
              });
          });

          $users.delegate('.remove','click',function(){
              var $li = $(this).closest('li');

              $.ajax({
                 type : 'DELETE',
                 url :'<?php echo base_url('api/rest_db/demo'); ?>/id/' + $(this).attr('data-id'),
                 success: function(){
                    $li.fadeOut(300, function(){
                        $(this).remove();
                    });
                 },
                 error:function(){
                    alert('oops something wrong');
                 }

              });
          });


          $users.delegate('.editUser','click',function(){
          //  alert('edit');
              var $li = $(this).closest('li');

              $li.find('input.nama').val($li.find('span.nama').html());
              $li.find('input.email').val($li.find('span.email').html());
              $li.addClass('edit');
          });

          $users.delegate('.cancelEdit','click',function(){
              $(this).closest('li').removeClass('edit');
          });

          $users.delegate('.saveEdit','click',function(){
              var $li = $(this).closest('li');
              var user = {
                  id : $li.attr('data-id'),
                  nama : $li.find('input.nama').val(),
                  email : $li.find('input.email').val()
              };

              $.ajax({
                 type : 'PUT',
                 url :'<?php echo base_url('api/rest_db/demo'); ?>',
                 data:user,
                 success: function(user){
                   $li.find('span.nama').html(user.nama);
                   $li.find('span.email').html(user.email);
                   $li.removeClass('edit');
                 },
                 error:function(){
                    alert('oops something wrong');
                 }

              });

          });

      });
    </script>
  </body>
</html>
