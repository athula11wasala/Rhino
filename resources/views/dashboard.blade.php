@include("layouts/header")


{{Form::open(['url'=>'subject-mark/add','method'=>'post','id'=>'frm']) }}
<div class="form-group">
    <label for="email">Json TextField:</label>
    {!! Form::textarea('', null, ['id' => 'txtjson', 'rows' => 6, 'cols' => 670,'class'=>'form-control',
    'style'=>"margin: 0px -2.99716px 0px 0px; width: 1143px; height: 345px;"
    ]) !!}

</div>
<button type="button" id="submit" class="btn btn-default">Submit</button>
{{Form::close() }}

@include("layouts/footer")