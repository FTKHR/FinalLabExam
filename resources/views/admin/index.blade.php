<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('document').ready(function () {
        $('.delEmp').click(function(e){
            var r = confirm("Confirm delete?");
            if (r == true) {
                location.href = '/admin/delete/'+ e.target.value;
            } else {
            }
        });
    });
    
</script>
<body>
    <h1>Admin Panel</h1>
    <div>
        <button onclick="location.href += '/register'">Add Employer</button>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>CompanyName</th>
            <th>Contact Number</th>
            <th colspan="2">Action</th>
        </tr>
          @foreach ($data as $employer)
            <tr>
                <td>{{$employer->id}}</td>
                <td>{{$employer->username}}</td>
                <td>{{$employer->name}}</td>
                <td>{{$employer->companyName}}</td>
                <td>{{$employer->contactNumber}}</td>
            <td><button onclick="location.href = '/admin/edit/{{$employer->id}}'">Edit</button>
                 <button style="color: red" class="delEmp" value="{{$employer->id}}">Delete</button>
            </td>
            </tr>
        @endforeach
    </table>
</body>
</html> 
