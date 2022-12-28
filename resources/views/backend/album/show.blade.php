@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Category Show</h2>
            </div>
            <div class="col-auto">
     
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Categories</a></li>
              <li class="breadcrumb-item active">Category Show</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <div class="card-body">
                          <table>
                              <tr>
                                <strong>  Category Name:</strong> {{$category->name}}
                                  <p>
                                  <strong>Category Description:</strong> {{$category->descriptions}}
                                  </p>
                              </tr>
                             
                           
                          </table>
                      </div>
                    
                    </div>
        </div>
    
          </div>
     
        </div>


@endsection
