<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="resources/css/app.css">
  <title>Assignmet2-Export&Import</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <br>
        <a href="{{url('/create')}}">
          <button  class="btn btn-primary btn-sm mb-3 mr-5">
            <i class="fa fa-plus"></i>Add
          </button>
        </a>
        <a href="{{url('/export')}}">
          <button  class="btn btn-secondary btn-sm mb-3">
            <i class="fa fa-download"></i>Download
          </button>
        </a>               
        <form action="{{url('/import')}}" method= "post" enctype="multipart/form-data">
          @csrf
          @method('GET')
          <input type="file" name="uploadfile">
          <button  class="btn btn-secondary btn-sm mb-3">
            <i class="fa fa-upload"></i>Upload
          </button>
        </form><br>
        <h5>Students List</h5>
        @if(Session('successAlert'))
        <div class="alert alert-success alert-dismissible fade show">
          <strong>{{Session('successAlert')}}</strong> .
          <button type="button" class="close" data-dismiss="alert" float="right">&times;</button>                 
        </div>
        @endif
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Gender</th>
              <th>DOB</th>
              <th>Address</th>
              <th>Major Name</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            @foreach($studentsList as $student)
            <tr>
              <td>{{$student->id}}</td>
              <td>{{$student->name}}</td>
              <td>{{$student->father_name}}</td>
              <td>{{$student->gender}}</td>
              <td>{{$student->dob}}</td>
              <td>{{$student->address}}</td>
              <td>{{$student->major_name}}</td>
              <td>
                <form action="{{url('destroy/'.$student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <a href="{{url('edit/'.$student->id)}}">
                    <button class="btn btn-success btn-sm" type="button">
                      <i class="fa fa-edit"></i> Edit
                    </button>
                  </a>  
                  <button type="submit" class="btn btn-danger btn-sm" onclick= "return confirm('Are you sure to delete')">
                    <i class="fa fa-trash"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$studentsList->links()}}
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>    
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>