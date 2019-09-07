<!DOCTYPE html>
<html>
<head>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>T.O.S ver. 1.0</title>
  <title>Hi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

            <div class="container" style="margin-top: 320px;font-size: 30px;">
                <div class="row">
                   <div class="col-md-4">
                       <div>
                         <a href="przedsiebiorca/zabezpieczenie/stare" role="button" class="btn btn-danger" style="margin-bottom:5px;">
                        Zarzenia&nbsp;<span class="badge badge-light">{{$count = \App\Zdolnosc::where('data_do','<',date('Y-m-d'))->count()}}</span>
                        <span class="sr-only">unread messages</span>
                         </a>
                       </div>
                       <a href="/przedsiebiorca" role="button" class="btn btn-primary" style="font-size:30px;">PRZEDSIĘBIORCY</a>
                   </div>
                   <div class="col-md-4">
                        <div>
                           &nbsp;
                        </div>
                        <a href="#" role="button" class="btn btn-success" style="font-size:30px;">OSK i INTRUKTORZY</a></div>
                   <div class="col-md-4">
                        <div>
                           &nbsp;
                         </div>
                        <a href="#" role="button" class="btn btn-warning" style="font-size:30px;">SKP i DIAGNOŚCI</a></div>
                </div>
            </div>


    </body>
</html>
