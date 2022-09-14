@extends('admin.layouts.master')

@section('content')

<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li><a>Edit Category</a></li>

                        </ul>
                    </div>
                </div>
                @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif


                     <div class="row animated fadeInUp">
                    <div class="col-sm-12 col-lg-9">
                    	 <div class="modal-body">

      	<form action="{{route('category.update',$category->id)}}" method="POST">

      		@csrf
            @method('put')

      	<div class="row">
      		<div class="col-sm-8">
      			<div class="form-group">
      				<label>Category Name</label>

      				<input type="text" name="name" value="{{ $category->name }}" class="form-control" required>


      			</div>

      		</div>
              <div class="col-sm-8">
                <div class="form-group">
                    <label>Parent Category</label>


                  <select name="parent_id" class="form-control">
                    <option value="">Please select a parent category</option>
                    @foreach($categories as $category1)

                    <option
                    @if($category->id == $category1->id)
                    selected

                    @endif value="{{$category1->id }}">{{ $category1->name }}</option>
                    @endforeach
                   </select>




                </div>

            </div>
              <div class="col-sm-8">
                <div class="form-group">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>


                </div>

            </div>



      	</div>
      </form>

      </div>



  </div>
</div>



  @endsection
