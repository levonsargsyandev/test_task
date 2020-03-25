@extends('layouts.app')
@section('title','Company Show')
@section('content')
<div class="container">
<h3>Company</h3>
<div class="row">
   <table class="table">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Web site</th>
          <th>Address</th>
          <th>Edit Company</th>
          <th>Delete Company</th>
        </tr>
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>
              @if ($company->logo)
                <img src="{{url('/storage/'.$company->logo)}}" alt="Company logo" height="50" width="50">
                @else
                <img src="{{url('/storage/logo1.png')}}" alt="Default logo" height="50" width="50">
               @endif
            </td>
            
            <td>{{ $company->website }}</td>
            <td>{{ $company->adress }}</td>
            <td><a href="{{route('companies.edit', $company->id)}}" class = "btn btn-info">Edit</a></td>
            <td>
              <form id="destroy-form" action="{{ route('companies.destroy', $company->id)}}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-danger" value="Delete" @if(Session::get('company') && $company->id != Session::get('company')->id) disabled @endif>
              </form>
            </td>
          </tr>
        </table>
</div>
@if(Session::get('company') && $company->id == Session::get('company')->id)
<div class="row">
  <a href="{{route('employe.create.company_id', $company->id)}}" class = "btn btn-info">Create Employe</a>
</div><br>
 @endif
<div class="container">
  
</div>
@if(count($company->employes) > 0)
<h3>Employes</h3>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
              <caption>List of Company Employes</caption>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Salary</th>
                @if(Session::get('company') && $company->id == Session::get('company')->id)
                  <th>Edit</th>
                  <th>Delete</th>
                @endif
              </tr> 
              @foreach($company->employes as $employe)
                <tr>
                  <td>{{ $employe->id }}</td>
                  <td>{{ $employe->name }}</td>
                  <td>{{ $employe->email }}</td>
                  <td>
                    {{$employe->position->position_name}}
                  </td>
                  <td>{{ $employe->phone }}</td>
                  <td>{{ $employe->salary }}</td>
                  @if(Session::get('company') && $company->id == Session::get('company')->id)
                    <td><a href="{{route('employes.edit', $employe->id)}}" class = "btn btn-info">Edit</a></td>
                    <td>
                      <form id="destroy-form" action="{{ route('employes.destroy', $employe->id)}}" method="POST" >
                          @method('DELETE')
                          @csrf
                          <input type="submit" class="btn btn-danger" value="Delete">
                      </form>
                    </td>
                  @endif
                </tr>
              @endforeach
            </table>
        </div>
    </div>
  @endif

  @if(Session::get('company'))
  <div>
    <h3>Commets</h3>
    <div class="container">
      <form action="{{route('post.comment')}}" method = "post" class="mb-2">
       @csrf
       <div class="form-group">
         <label for="name">Comment</label>
         <textarea class="form-control" id="body" name="body" rows="4" cols="50"></textarea>
       </div>
       
         <input type="hidden" name = "comment_company_id" class="form-control" value="{{$company->id}}">
         
       <button type = "submit" class = "btn btn-success">Send</button>
     </form>
    @foreach($company->comments as $comment)
      <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-2">
                      <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                      <p class="text-secondary text-center">{{ $comment->created_at->diffForHumans() }}</p>
                  </div>
                  <div class="col-md-10">
                      <p>
                          <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$comment->company->name}}</strong></a>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                     </p>
                     <div class="clearfix"></div>
                      <p>{{$comment->body}}</p>
                      
                  </div>
              </div>
          </div>
      </div>
  @endforeach
  </div>

  </div>
 @endif


@endsection


