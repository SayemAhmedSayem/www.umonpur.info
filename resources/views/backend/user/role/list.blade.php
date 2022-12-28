@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
<div class="col-auto">
              <h2 class="mb-0">Roles List</h2>
 </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('roles.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>Add Role
                  </a>
              </div>
            </div>
        <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Roles</a></li>
              <li class="breadcrumb-item active">Role List</li>
            </ol>
        </nav>
   </div>

          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
          
         
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 bg-white border-y border-300 mt-2 position-relative top-1">
              <div class="table-responsive scrollbar mx-n1 px-1">
              <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category Name</th>
                            <th scope="col" width="30%">Descriptions</th>
                            <th scope="col">Permission</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key => $role)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
            
                            <td>{{$role->name}}</td>
                            <td>{{ Str::limit($role->description, 10) }}</td>
							<td>
								<a href="{{route('permission.index',$role->id)}}">Manage Permissions</a>
							</td>

                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('roles.show', $role->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('roles.edit', $role->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
             
              </div>
        
            </div>
          </div>

@endsection
