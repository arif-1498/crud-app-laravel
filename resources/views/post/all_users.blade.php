@extends('dashboard')

@section("content")
<div class="overflow-x-auto ">
  <table id="users-table" class="display" >
    <thead >
      <tr>
       
        <th >Name</th>
        <th >Email</th>
        <th >Gender</th>
         <th >Age</th>
      </tr>
    </thead>
    <tbody  >
     
     
    </tbody>
  </table>

 

  
</div>


@endsection

@section('scripts')
<script>
   console.log("script is runing  from all users ");
   
  $(document).ready(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
      ajax:{
               url: "{{ route('users.index') }}",
               type: 'GET',
            },

      columns: [
      {
        data: 'name',
        name: 'name'
      },
      {
        data: 'email',
        name: 'email'
      },
      {
        data: 'gender',
        name: 'gender'
      },
      {
        data: 'age',
        name: 'age'
      }
    ]
    
       
    });
  });
   
</script>
@endsection


