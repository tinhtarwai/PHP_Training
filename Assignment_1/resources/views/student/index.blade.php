@extends('layouts.app')

@section('content')

{{-- Add Modal --}}
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddStudentModalLabel">Add Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <ul id="save_msgList"></ul>

          <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" required class="name form-control">
          </div>
          <div class="form-group mb-3">
            <label for="">Father Name</label>
            <input type="text" required class="father_name form-control">
          </div>
          <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <input type="radio" class="gender" name="gender" value="male">Male
            <input type="radio" class="gender" name="gender" value="female">Female
          </div>
          <div class="form-group mb-3">
            <label for="">DOB</label>
            <input type="date" required class="dob form-control">
          </div>
          <div class="form-group mb-3">
            <label for="">Address</label>
            <input type="text" required class="address form-control">
          </div>
          <div class="form-group mb-3">
            <label for="">Specialized Major</label>
            <select name="major" class="major"class="mb-3">
              <option value="Myanmar">Myanmar</option>
              <option value="English">English</option>
              <option value="Maths">Maths</option>
              <option value="Chemistry">Chemistry</option>
              <option value="Physics">Physics</option>
              <option value="Biology">Biology</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_student">Save</button>
      </div>
    </div>
  </div>
</div>


{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <ul id="update_msgList"></ul>
        <input type="hidden" id="stud_id" />

        <div class="form-group mb-3">
          <label for="">Name</label>
          <input type="text" id="name" required class=" form-control">
        </div>
        <div class="form-group mb-3">
          <label for="">Father Name</label>
          <input type="text" id="father_name" required class="father_name form-control">
        </div>
        <div class="form-group mb-3">
          <label for="">Gender</label>
          <input type="radio" id="gender" name="gender" required value="male">Male
          <input type="radio" id="gender" name="gender" required value="female">Female
        </div>
        <div class="form-group mb-3">
          <label for="">DOB</label>
          <input type="date" id="dob" required class=" form-control">
        </div>
        <div class="form-group mb-3">
          <label for="">Address</label>
          <input type="text" id="address" required class=" form-control">
        </div>
        <div class="form-group mb-3">
          <label for="">Specialized Major</label>
          <select name="major" id="major"class="mb-3">
            <option value="Myanmar">Myanmar</option>
            <option value="English">English</option>
            <option value="Maths">Maths</option>
            <option value="Chemistry">Chemistry</option>
            <option value="Physics">Physics</option>
            <option value="Biology">Biology</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update_student">Update</button>
      </div>
    </div>
  </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Confirm to Delete Data ?</h4>
        <input type="hidden" id="deleteing_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_student">Delete</button>
      </div>
    </div>
  </div>
</div>
{{-- End - Delete Modal --}}

<div class="container py-5">
  <div class="row">
    <div class="col-md-12">
      <div id="success_message"></div>
      <div class="card">
        <div class="card-header">
          <h4>
            Student Data
            <button type="button" class="btn btn-secondary float-end" data-bs-toggle="modal"
                data-bs-target="#AddStudentModal">Add Student</button>
          </h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Major Name</th>
                <th>Join Date</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
      fetchstudent();

      function fetchstudent() {
        $.ajax({
          type: "GET",
          url: "/api/fetch-students",
          dataType: "json",
          success: function (response) {
            // console.log(response);
            $('tbody').html("");
            $.each(response.students, function (key, item) {
              $('tbody').append('<tr>\
                <td>' + item.id + '</td>\
                <td>' + item.name + '</td>\
                <td>' + item.father_name + '</td>\
                <td>' + item.gender + '</td>\
                <td>' + item.dob + '</td>\
                <td>' + item.address + '</td>\
                <td>' + item.major_name + '</td>\
                <td>' + item.created_at + '</td>\
                <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
              \</tr>');
            });
          }
        });
      }

      $(document).on('click', '.add_student', function (e) {
        e.preventDefault();
        $(this).text('Sending..');
        var data = {
          'name': $('.name').val(),
          'father_name': $('.father_name').val(),
          'gender': $('.gender:checked').val(),
          'dob': $('.dob').val(),
          'address': $('.address').val(),
          'major': $('.major').val(),
        }

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "POST",
          url: "/api/store",
          data: data,
          dataType: "json",
          success: function (response) {
            console.log(response);
            if (response.status == 400) {               
              $('#save_msgList').html("");
              $('#save_msgList').addClass('alert alert-danger');
              $.each(response.errors, function (key, err_value) {
                  $('#save_msgList').append('<li>' + err_value + '</li>');
              });
              $('.add_student').text('Save');
            } else {
              $('#save_msgList').html("");
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#AddStudentModal').find('input').val('');
              $('#AddStudentModal').find('input[name^="gender"').val('');
              $('#AddStudentModal').find('select').val('');
              $('.add_student').text('Save');
              $('#AddStudentModal').modal('hide');
              fetchstudent();
            }
          }
        });
      });

      $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var stud_id = $(this).val();
        // alert(stud_id);
        $('#editModal').modal('show');
        $.ajax({
          type: "GET",
          url: "/api/edit/" + stud_id,
          success: function (response) {
            if (response.status == 404) {
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#editModal').modal('hide');
            } else {
              // console.log(response.student.name);
              $('#name').val(response.student.name);
              $('#father_name').val(response.student.father_name);
              //$('#gender').val(response.student.gender).attr('checked',true);
              $('input[name^="gender"][value="'+response.student.gender+'"').prop('checked',true);
              $('#dob').val(response.student.dob);
              $('#address').val(response.student.address);
              //$('#major').val(response.student.major).prop('selected', 'selected');
              $('select[name^="major"][value="'+response.student.major+'"').prop('selected','selected');
              $('#stud_id').val(stud_id);
            }
          }
        });
        $('.btn-close').find('input').val('');
      });

      $(document).on('click', '.update_student', function (e) {
        e.preventDefault();

        $(this).text('Updating..');
        var id = $('#stud_id').val();
        // alert(id);

        var data = {
          'name': $('#name').val(),
          'father_name': $('#father_name').val(),
          'gender': $('#gender:checked').val(),
          'dob': $('#dob').val(),
          'address': $('#address').val(),
          'major': $('#major').val(),              
        }

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "POST",
          url: "/api/update/" + id,
          data: data,
          dataType: "json",
          success: function (response) {                 
            if (response.status == 400) {
              $('#update_msgList').html("");
              $('#update_msgList').addClass('alert alert-danger');
              $.each(response.errors, function (key, err_value) {
                $('#update_msgList').append('<li>' + err_value +
                      '</li>');
              });
              $('.update_student').text('Update');
            } else {
              $('#update_msgList').html("");
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#editModal').find('input').val('');
              $('#AddStudentModal').find('select').val('');
              $('#AddStudentModal').find('input[name^="gender"').prop('checked',false);
              $('.update_student').text('Update');
              $('#editModal').modal('hide');
              fetchstudent();
            }
          }
        });

      });

      $(document).on('click', '.deletebtn', function () {
        var stud_id = $(this).val();
        $('#DeleteModal').modal('show');
        $('#deleteing_id').val(stud_id);
      });

      $(document).on('click', '.delete_student', function (e) {
        e.preventDefault();

        $(this).text('Deleting..');
        var id = $('#deleteing_id').val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "DELETE",
          url: "/api/destroy/" + id,
          dataType: "json",
          success: function (response) {
            // console.log(response);
            if (response.status == 404) {
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('.delete_student').text('Yes Delete');
            } else {
              $('#success_message').html("");
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('.delete_student').text('Yes Delete');
              $('#DeleteModal').modal('hide');
              fetchstudent();
            }
          }
        });
      });
    });
</script>
@endsection
