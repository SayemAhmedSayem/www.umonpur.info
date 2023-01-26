@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">প্রশংসাপত্র তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('testimonial.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>প্রশংসাপত্র পোস্ট
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">প্রশংসাপত্র</a></li>
              <li class="breadcrumb-item active">প্রশংসাপত্র তালিকা</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="5%">Images</th>
                            <th scope="col" width="10%">Member Name</th>
                            <th scope="col" width="10%">পেশাগত</th>
                            <th scope="col" width="10%">বার্তা</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $key => $test)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/testimonial/'.$test->image) }}" alt="" width="53"></td>
                         
                            <td>{{$test->name}}</td>
                            <td>{{$test->designation}}</td>
                            <td>{{ Str::limit($test->message, 50) }}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('testimonial.destroy',$test->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('testimonial.show', $test->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('testimonial.edit', $test->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $testimonials->links() !!}
            </div>
                    </div>
        </div>
    
          </div>
     
        </div>


@endsection
