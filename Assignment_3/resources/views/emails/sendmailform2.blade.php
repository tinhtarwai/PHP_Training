<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha383-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/app.css">
  <title>Assignmet5-Mail</title>
</head>
<body>
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <div style="margin:100px 400px 20px">
        <h2> Mail Sending Tutorial</h2>
      </div>
      <form method="post" action="{{url('/upload')}}" enctype="multipart/form-data">
        @csrf 
          <!--@method('GET')-->
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email">
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="document">Document:</label>
            <input type="file" class="form-control" name="document">
          </div>
        </div>
        </div><br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-info btn-sm">Upload</button>
            <a href="{{url('/send-mail-form')}}">
              <button type="button" class="btn btn-secondary btn-sm">
                Go Back<i class="fa fa-arrow-left"></i>
              </button>
            </a>
          </div>
        </div>
      </form>
      
    </div>
  </div>    
  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha383-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="resources/js/app.js"></script>
</body>
</html>