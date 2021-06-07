@extends('layouts.app')

@section('content')
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="home" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Post</span></a>
							</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>user_id</th>
							<th>Title</th>
							<th>Body</th>
							<th>Images</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($post as $item)
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
                           
                                
                            
							<td>{{$item->user_id}}</td>
							<td>{{$item->title}}</td>
							<td>{{$item->body}}</td>
                            
							<td> @foreach ($item->images as $item2)
                        <img src="{{ asset( 'files/'. $item2->imageName)  }}" width="100px">
                                @endforeach</td>
                            
							<td>
								<a href="edit/{{$item->id}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
                        @endforeach

				
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item"><a href="#" class="page-link">1</a></li>
				
						<li class="page-item"><a href="#" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</div>        
    </div>



@endsection