@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">স্লাইডার তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('sliders.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>স্লাইডার যুক্ত করুন
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">স্লাইডার</a></li>
              <li class="breadcrumb-item active">স্লাইডার তালিকা</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="30%">স্লাইডার ফটো</th>
                            <th scope="col" width="25%">শিরোনাম</th>
                            <th scope="col" width="25%"> সংকিপ্ত বর্ণনা</th>
                            <th scope="col" width="15%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $key => $slider)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/sliders/'.$slider->image) }}" alt="" width="300"></td>
                         
                            <td>{{$slider->title}}</td>
                            <td>{{ Str::limit($slider->desscriptions, 100) }}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('sliders.destroy',$slider->id)}}" method="POST">
                                @if($slider->id ==1 || $slider->id==2 || $slider->id ==3)
                               
                                    <a href="{{route('sliders.edit', $slider->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                 @else
                                 @csrf
                    @method('DELETE')
                                 <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('sliders.edit', $slider->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                   @endif
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $sliders->links() !!}
            </div>
                    </div>
        </div>
    
          </div>
     
        </div>


@endsection
