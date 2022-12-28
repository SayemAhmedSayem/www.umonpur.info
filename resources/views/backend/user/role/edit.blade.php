@extends('layouts.header')

@section('content')
<div class="row align-items-center justify-content-between g-3 mb-4">
<div class="col-auto">
              <h2 class="mb-0">Roles Upade</h2>
 </div>
           
        <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Roles</a></li>
              <li class="breadcrumb-item active">Role Upade</li>
            </ol>
        </nav>
   </div>
	
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="header-title">{{ _lang('Update Role') }}</h4>
			</div>
			<div class="card-body">
				<form method="post" class="validate" autocomplete="off" action="{{ action('App\Http\Controllers\RoleController@update', $role->id) }}" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">				
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							   <label class="control-label">{{ _lang('Name') }}</label>						
							   <input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
							</div>
						</div>

						<div class="col-md-12 pt-3">
							<div class="form-group">
							   <label class="control-label">{{ _lang('Description') }}</label>						
							   <textarea class="form-control" name="description">{{ $role->description }}</textarea>
							</div>
						</div>

						
						<div class="col-md-12 pt-5">
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-sm"><i class="ti-save"></i> {{ _lang('Save Changes') }}</button>
							</div>
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

@endsection


