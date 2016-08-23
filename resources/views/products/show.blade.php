@extends('layouts.index')
@section('content')

<div class="section">
	<div class="card-panel purple darken-3 white-text">Products</div>
</div>

<div class="section">
	
	<div class="row">
		<div class="col s12">
			<h5>{{ $show->name }}</h5>

            <div class="divider"></div>
            <p>{!! $show->model !!}</p>
            <div class="divider"></div>
            <p>{!! $show->desc !!}</p>
                
		</div>
	</div>

</div>

@endsection