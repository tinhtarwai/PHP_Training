<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha383-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/app.css">
  <title>Assignmet3-Search</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h5>Create New Student</h5>
        <form action="{{url('/store')}}" method= "post">
          @csrf
            <!--@method('get')-->
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror mb-3" placeholder="Enter name" value= "{{old('name')}}">
            @error('name')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <label for="f-name">Father Name</label>
            <input type="text" name="father_name" class="form-control mb-3 @error('father_name') is-invalid @enderror" placeholder="Enter father name" value= "{{old('father_name')}}">
            @error('father_name')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" class="mb-3" value="other">Other<br>
            @error('gender')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control mb-3 @error('dob') is-invalid @enderror" placeholder="Enter your birthday" value= "{{old('dob')}}">
            @error('dob')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control mb-3 @error('address') is-invalid @enderror" placeholder="Enter address" value= "{{old('address')}}">
            @error('address')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <label for="major">Specialized Major</label>
            <select name="major" id="major"class="mb-3">
              <option value="Myanmar">Myanmar</option>
              <option value="English">English</option>
              <option value="Maths">Maths</option>
              <option value="Chemistry">Chemistry</option>
              <option value="Physics">Physics</option>
              <option value="Biology">Biology</option>
            </select>
            @error('major')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <button class="btn btn-primary">Create</button>    
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>    
  <!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha383-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>