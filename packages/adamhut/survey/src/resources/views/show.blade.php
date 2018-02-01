@extends('survey::template.html')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>{{$audit->name}}</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
             <div class="panel panel-default">
                <div class="panel-heading">
                    List of Checklist Items
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($audit->checklist as $list)
                            <li>
                                {{$list->description}}
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Check List
                </div>
                <div class="panel-body">
                    <form action="{{route('audit.checklist.store')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="audit_id" value="{{$audit->id}}">
                        <div class="form-group">
                            <label for="description">Description CheckList</label>
                            <input type="text"
                                name="description"
                                id="description"
                                value="{{old('description')}}"
                                class="form-control"
                                placeholder="Enter your checklist"
                            >
                            @if($errors->has('description'))
                                <span class="class">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description CheckList</label>
                            <input type="radio"
                                name="correct_answer"
                                value="1"
                            >Yes <br/>
                            <input type="radio"
                                name="correct_answer"
                                value="0"
                            >No
                            @if($errors->has('name'))
                                <span class="class">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection