@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col-auto">
              <h2 class="mb-0">প্রোফাইল তালিকা</h2>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('profile.index')}}">Profile</a></li>
              <li class="breadcrumb-item ">{{$prof->name}}</li>
              <li class="breadcrumb-item active">Members</li>
            </ol>
          </nav>
          </div>

          <div class="code-to-copy">
                <div class="row">
                    <div class="col-sm-4">
                       <h4>Add Members</h4>
                       <form action="{{route('profile.member-store')}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
                       <div class="row p-3">
                        <select name="user_id" id="" class="form-control">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="profile_id" value="{{$prof->id}}">
                       </div>
                       <button type="submit" class="btn btn-primary">Save changes</button>
                       </form>
                    </div>
                    <div class="col-sm-8">
                    <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="15%">Images</th>
                            <th scope="col" width="25%">Name</th>
                            <th scope="col" width="30%">Phone</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $key => $profile)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/members/'.$profile->user->nid->image) }}" alt="" width="53"></td>
                         
                            <td>{{$profile->user->name}}</td>
                            <td>{{$profile->user->nid->phone}}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('profile-member.destroy',$profile->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
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
        </div>
    
          </div>
     
        </div>

</div>
@endsection
