@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Members List</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Members</a></li>
            <li class="breadcrumb-item active">Members List</li>
         </ol>
      </nav>
   </div>
   <ul class="nav nav-links mb-2 mx-n2">
   <?php 
   $all = App\Models\User::All()->count();
   
   ?>
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">All <span class="text-700 fw-semi-bold">({{$all}})</span></a></li>
              @foreach(App\Models\Role::All() as $role)
          <li class="nav-item"><a class="nav-link"  href="{{route('member-sort', $role->id)}}">{{$role->name ?? ''}} <span class="text-700 fw-semi-bold">
            
         <?php
         $count = App\Models\User::where('role_id', $role->id)->count();
         
         ?>
        ({{$count}})
        </span></a></li>
          @endforeach

            </ul>
          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
          
         
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 bg-white border-y border-300 mt-2 position-relative top-1">
              <div class="table-responsive scrollbar mx-n1 px-1">
              <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="5%">Images</th>
                            <th scope="col" width="10%">Name</th>
                            <th scope="col" width="10%">নাম</th>
                            <th scope="col" width="20%">Phone</th>
                            <th scope="col" width="20%">NID / Birth Id.</th>
                            <th scope="col" width="10%">Role</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="15%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $key => $member)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img  style="border-radius:50%" src="{{ asset('uploads/members/'.$member->nid->image) }}" alt="" height="80px" width="80px"></td>
                       
                            <td>{{$member->name}}</td>
                            <td>{{$member->nid->name_bn ?? ''}}</td>
                            <td>{{$member->nid->phone}}</td>
                            <td>{{$member->nid->nid}}</td>
                       
                            <td>  <span class="badge bg-warning">{{$member->role->name}}</span> </td>
                            <td>
                              @if($member->status==0)
                          <span class="badge bg-danger">Inactive</span>
                          @elseif($member->status==1)
                          <span class="badge bg-success">Active</span>
                          @endif

                          </td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                           
                                  
                                  
                                    <a href="{{route('members.edit', $member->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> Manage</a>
                             
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                <div class="d-flex">
                {!! $members->links() !!}
            </div>
              </div>
        
            </div>
          </div>

@endsection
