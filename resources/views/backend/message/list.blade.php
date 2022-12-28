@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Messages</h2>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">Messages</a></li>
 
            </ol>
          </nav>
          </div>
    
          <div class="row">
          <div class="col-sm-4" style="background:#ffffff;">
       <br>
          <h5 class="text-semi-bold text-black mb-4 pt-3">Messages</h5>
       @foreach($messages as $message)
          <div class="row align-items-md-center mb-4 g-3">
            <div class="col-auto">
              <div class="avatar avatar-xl" style="background: #cfcfcf;border-radius: 50% padding:10px;width: 50px;height: 50px;border-radius: 50%;"><span style="font-size:30px;padding:12px;color:#ffffff; ">{{ Str::limit($message->name, 1) }}</span></div>
            </div>
            <div class="col-auto flex-1">
              <div class="row justify-content-sm-between align-items-center">
              <div class="col-md-auto col-12">
                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">  {{ \Carbon\Carbon::parse($message->created_at)->isoFormat('llll')}} </span></p>
                </div>
                <div class="col-md-auto col-12">
                  <h4 class="fs--1 text-black mt-1"><a href="{{route('message.show', $message->id)}}">{{$message->name}}</a></h4>
                  <p class="fs--1 mb-1 mb-md-0 text-1000">{{ Str::limit($message->message, 70) }}</p>
                </div>
           
              </div>
            </div>
          </div>
          <hr>

       @endforeach
       <div class="d-flex">
                {!! $messages->links() !!}
            </div>
          </div>

        @if($mg)
        <div class="col-sm-8">
          <div class="card shadow-none border border-300" data-component-card>
                  <div class="card-header p-4 00 ">
                    <div class="row g-3 justify-content-between align-items-center">
                      <div class="row">
                        <div class="col-sm-8">
                        <h4 class="text-900 mb-0 pt-3" data-anchor>{{$mg->subject}} </h4>
                        </div>
                        <div class="col-sm-4">
                        <div class="button-group" style="display:flex !important; float:right;">
                        <form action="{{route('message.destroy',$mg->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                    <a href="{{route('message.edit', $mg->id)}}" > {{$mg->status==1 ? 'Mark as Unread' : 'Mark as read'}}</a>
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                  
                        </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                  </div>
                  <div class="card-body p-3">
                <div class="row">
                  <div class="col-sm-6">
                  <div class="row align-items-md-center mb-4 g-3">
<div class="col-auto">
  <div class="avatar avatar-xl" style="background: #cfcfcf;border-radius: 50% padding:10px;width: 50px;height: 50px;border-radius: 50%;"><span style="font-size:30px;padding:12px;color:#ffffff; ">{{ Str::limit($mg->name, 1) }}</span></div>
</div>
<div class="col-auto flex-1">
  <div class="row justify-content-sm-between align-items-center">

    <div class="col-md-auto col-12">
      <h4 class="fs--1 text-black mt-1">From: <a href="#">{{$mg->name }}</a></h4>
      <h4 class="fs--1 text-black mt-1">Email: <a href="#">{{$mg->email}}</a></h4>
  
    </div>

  </div>
</div>
</div>
                  </div>
                  <div class="col-sm-6">
                  <div class="col-md-auto col-12">
      <p class="text-800 fs--1 mb-0" style="text-align: right;"><span class="me-1 fas fa-clock"></span><span class="fw-bold">  {{ \Carbon\Carbon::parse($message->created_at)->isoFormat('llll')}} </span></p>
    </div>
                    </div>
                </div>
                <div class="col-md-auto col-12">
                  <p>{{$mg->message}}</p>
                  <div class="pt-5">
                    <hr>
                @if($mg->image==!NULL)
                <h5>Attachment</h5>
                  <img src="{{ asset('uploads/message/'.$mg->image) }}" class="card-image-top" height="100px" alt="thumbnail"><br>
                  <a target="_blank" href="{{ asset('uploads/message/'.$mg->image) }}"><h6 style="color:green;margin-top:5px;">Download</h6></a>
                @endif
                  </div>
                  </div>
                  </div>
                </div>
          </div>

        @endif
 
        </div>
        </div>
    
          </div>
     
  



@endsection
