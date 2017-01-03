<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Contact us</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br /><br />
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					{!! Form::open(array('url'=>'contact','method'=>'POST', 'id'=>'myform')) !!}
					
					<div class="form-group">
						<label class="col-md-4 control-label">Name</label>
						<div class="col-md-6">
							{!! Form::text('name','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Your Full Name')) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">E-Mail Address</label>
						<div class="col-md-6">
							{!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Your Email')) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Subject</label>
						<div class="col-md-6">
							{!! Form::text('subject','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Your Subject')) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Message</label>
						<div class="col-md-6">
							{!! Form::textarea('msg','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Your Full Name')) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Captcha</label>
						<div class="col-md-6">
							{!! app('captcha')->display(); !!}
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
