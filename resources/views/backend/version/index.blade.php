@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">ভার্সন তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('version.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>ভার্সন যুক্ত করুন
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">ভার্সন</a></li>
              <li class="breadcrumb-item active"> ভার্সন তালিকা</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="15%">স্ক্রিনশট ফটো</th>
                            <th scope="col" width="10%"> বছর</th>
                            <th scope="col"  width="15%">ভার্সন নাম</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($versions as $key => $version)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/version/'.$version->image) }}" alt="" height="100"></td>
                         
                            <td>{{$version->year}}</td>
                            <td>{{$version->version_title}}</td>
           
             
                            <td>
                               <div class="button-group" style="display:flex !important;">
                           
                                    <a href="{{route('version.edit', $version->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> Manage</a>
                              
                            
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


@endsection
