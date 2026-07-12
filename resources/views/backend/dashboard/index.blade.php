@extends('layouts.header')

@section('content')
@push('style')
<!-- <link rel="stylesheet" href="{{ asset('backend/assets/css/portal.css') }}"> -->
<style>
  .app-card.border-left-decoration {
    border-left: 3px solid #15a362;
}

.app-card {
    position: relative;
    background: #fff;
    border-radius: 0.25rem;
}
.c-f{
  color:#ffffff !important;
}
.app-card-stat .stats-figure {
    font-size: 2rem;
    color: #252930;
}
</style>

@endpush
<div class="content">



			    
			    <h1 class="app-page-title">ড্যাশবোর্ড</h1>
			    
		
   
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100" style="background: #1a8917;">
						    <div class="app-card-body p-3 p-lg-4" >
							    <h4 class="stats-type mb-2 c-f">সর্বমোট সদস্য</h4>
							    <div class="stats-figure"><h4 class="c-f">{{$memebrs}}</h4></div>
							    <div class="stats-meta text-success">
			</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100" style="background: #0277d7;">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-2 c-f">সর্বমোট আয়</h4>
							    <div class="stats-figure c-f">৳{{$incomes ?? ''}}</div>
							  
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100" style="background: #fe0000;">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1 c-f">সর্বমোট ব্যয়</h4>
							    <div class="stats-figure c-f">৳{{$expenses ?? ''}}</div>
							  
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100" style="background: #622569;">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1 c-f">Balance</h4>
							    <div class="stats-figure c-f">৳{{$incomes-$expenses}}</div>
							 <!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    <div class="row g-4 mb-4">
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-chart h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">সর্বশেষ আপডেট</h4>
							        </div><!--//col-->
							        <div class="col-auto">
								        <div class="card-header-action">
									        <a href="{{route('posts.index')}}">View All</a>
								        </div><!--//card-header-actions-->
							        </div><!--//col-->
						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body p-3 p-lg-4">
							 
						        <div class="chart-container">
                    <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                  

                            <th scope="col">Date</th>
                            <th scope="col" >Author</th>
                            <th scope="col">শিরোনাম</th>
                            <th scope="col">ক্যাটাগরি</th>
                   
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                          <tr>
                            <td>{{$post->date}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name ?? ''}}</td>
                           
                    
                     
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
						        </div>
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-chart h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">সর্বশেষ সদস্য</h4>
							        </div><!--//col-->
							        <div class="col-auto">
								        <div class="card-header-action">
									        <a href="{{route('members.index')}}">View All</a>
								        </div><!--//card-header-actions-->
							        </div><!--//col-->
						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body p-3 p-lg-4">
							  
						        <div class="chart-container">
				                <table class="table table-striped" width="100%">
                        <thead>
                          <tr>

                            <th scope="col">Images</th>
                            <th scope="col" >Name</th>
                            <th scope="col">Phone</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $member)
                          <tr>
                         
                            <td class="align-middle white-space-nowrap py-0"><img  style="border-radius:50%" src="{{ asset('uploads/members/'.$member->nid->image) }}" alt="" height="80px" width="80px"></td>
                       
                            <td>{{$member->name}}</td>
                            <td>{{$member->nid->phone}}</td>
                         
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
						        </div>
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
			        
			    </div><!--//row-->
			    <div class="row g-4 mb-4">
				    <div class="col-12 col-lg-12">
				        <div class="app-card app-card-progress-list h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">Pending Payments</h4>
							        </div><!--//col-->
							        <div class="col-auto">
								        <div class="card-header-action">
									        <a href="{{route('income.index')}}">All Payments</a>
								        </div><!--//card-header-actions-->
							        </div><!--//col-->
						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body">
							    <div class="item p-3">
								    <div class="row align-items-center">
									    <div class="col">
                      <table class="table table-striped" width="100%">
                  <thead>
                    <tr>
                     <th>Date</th>
                     <th>Payer Name</th>
                     <th>Transection No</th>
                     <th>Transection phone</th>
                     <th>Payment Mode</th>
                     <th>
                      Amount
                     </th>
                     <th>Type</th>
                     <th>
                      Approve
                     </th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($incomep as $key =>  $income)
                    <tr>
  
                     <td>{{$income->date}}</td>
                     <td>{{$income->user->name}}</td>
                     <td>{{$income->transection_no}}</td>
                     <td>{{$income->transection_phone}}</td>
                     <td>
                      @if($income->payment_type==1)
                      বিকাশ
                      @elseif($income->payment_type==2)
                      নগদ
                      @elseif($income->payment_type==3)
                      রকেট
                      @elseif($income->payment_type==4)
                      অন্যান্য
                      @endif</td>
                     <td>৳{{$income->amount}}</td>
                     <td>{{$income->income_type}}</td>
             
               
                     <td>
                 
                      <a href="{{route('income-approve', $income->id)}}" class="badge bg-success"><i class="fas fa-check"></i></a>
                   
                     </td>
                
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex">
                {!! $incomep->links() !!}
            </div>
										    
									    </div><!--//col-->
									 
								    </div><!--//row-->
							
							
								  
								    <a class="item-link-mask" href="#"></a>
							    </div><!--//item-->
		
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
	
			    </div><!--//row-->
			
			 
			    



@push('scripts')

    <script src="{{ asset('backend/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/index-charts.js') }}"></script>


@endpush
@endsection
