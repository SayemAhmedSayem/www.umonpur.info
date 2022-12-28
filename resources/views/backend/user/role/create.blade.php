@extends('layouts.header')
@section('content')
<div class="row align-items-center justify-content-between g-3 mb-4">
<div class="col-auto">
              <h2 class="mb-0">Roles Create</h2>
 </div>
           
        <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Roles</a></li>
              <li class="breadcrumb-item active">Role Create</li>
            </ol>
        </nav>
   </div>
		
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title">{{('Create Role') }}</h4>
			</div>
			<div class="card-body">
			    <form method="post" class="validate" autocomplete="off" action="{{ route('roles.store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">{{('Name') }}</label>						
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
							</div>
						</div>

						<div class="col-md-12 pt-3">
							<div class="form-group">
								<label class="control-label">{{('Description') }}</label>						
								<textarea class="form-control" name="description">{{ old('description') }}</textarea>
							</div>
						</div>

						
						<div class="col-md-12 pt-5">
							<div class="form-group">
								
								<button type="submit" class="btn btn-primary btn-lg"><i class="ti-save"></i> {{('Save Changes') }}</button>
							</div>
						</div>
					</div>			
			    </form>
			</div>
		</div>
    </div>
</div>
@endsection


