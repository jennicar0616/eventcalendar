<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
   </head>
<body>
<h1 style="text-align:center;"> Calendar of Events</h1>
  <div class="container">
    <div class=" jumbotron">
      <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <p> {{ \session::get('success')}} </p>
                </div>
            @endif
      </div>
<br>
<div class="container">
     <div calss="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
              </div>
            @endif
         <div calss="col-md-8 col-md-offset-2">
              <div calss="panel panel-default">
                  <div calss="panel-heading" style="background: #2e6da4; color: white">
                      Add Event To Calendar
                  </div>
                  <div class="panel-body">
        <form method="POST" action="{{ route('addevent.store') }}"  id="frmAddEvent" enctype="multipart/form-data">
                       {{ csrf_field() }}
                  <label for=""> Event Title </label>
                  <input class="form-control" type="text" name="title" placeholder="Title"/><br/><br/>
                  <label for=""> Color/Legend </label>
                  <input class="form-control" type="color" name="color" placeholder=""/><br/><br/>

                  <label for=""> Start Date </label>
                  <input class="form-control" type="date" name="start_date" class="date" placeholder=""/><br/><br/>
                  <label for=""> End Date </label>
                  
                  <input class="form-control" type="date" name="end_date"  class="date" placeholder=""/><br/><br/>
                  <input type="submit" name="submit" class="btn btn-primary" value="Add Event"/>
          </form>
               </div>    
            </div>
          </div>
        </div>
      </div>         

      <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                      <div class="panel-heading" style="background: #2e6da4; color: white">
                     
                      </div>
                    <div class="panel-body">
                   {!! $calendar->calendar() !!}
                    </div>
                  </div>
            </div>
      </div>
    </div>
  </div>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js">
  </script>
  {!! $calendar->script() !!}
</body>
</html>