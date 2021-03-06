@extends('survey::template.html')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>Add A Survey</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        
            <form action="{{route('survey.store')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" value="{{old('name')}}" class="form-control">
                    @if($errors->has('name'))
                        <span class="class">{{$errors->first('name')}}</span>
                    @endif
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" name="published" class="form-check-input">
                    Published the Survey
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        
        </div>
    </div>


@endsection