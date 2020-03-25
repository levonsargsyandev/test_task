@extends('layouts.app')
@section('title','Employe Create')
@section('content')
 <div class="row mt-5">
   <div class="col-sm-8 offset-sm-2">
     <form action="{{route('employes.store')}}" method = "post" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
         <label for="name">Nname:</label>
         <input type="text" name = "name" id = "name" class="form-control" required value="name">
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" name = "email" id = "email" class="form-control" required  value="mail@mail.ru">
       </div>
       <div class="form-group">
         <label for="phone">Phone:</label>
         <input type="phone" name = "phone" id = "phone" class="form-control" required value="1234536">
       </div>
       <div class="form-group">
          <label for="position">Position:</label>
          <select id="position" name="position_id">
            @foreach ($positions as $position)
              <option value="{{$position->id}}">{{$position->position_name}}</option>
              
            @endforeach
          </select>
        </div>
       <div class="form-group">
         <label for="salary">Salary:</label>
         <input type="text" name = "salary" id = "salary" class="form-control" required value="1234536">
       </div>
         <input type="hidden" name = "company_id" id = "company_id" class="form-control" value="{{$company_id}}" required>


       <button type = "submit" class = "btn btn-success">Submit</button>
     </form>
   </div>
 </div>
@endsection