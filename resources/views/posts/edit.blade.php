<div>
    {!! Form::model($post, ['route'=>['posts.update',$post->id], 'method' =>'PUT' ]) !!}

    {{Form::text('title',null,["class"=>'form-control'])}}
    {{Form::textarea('body',null,["class"=>'form-control'])}}
<div>
    route('posts.show',$post->id);
    <h1>
        {{$post->title}}
        {{$post->body}}
    </h1>
    <br>
    {!! Html::linkRoute('posts.show','cancel',array($post->id),array('class'=>'btn btn-danger btn-block'))!!}

   {{Form::submit('Save Changes!')}}


    {!! Form::close() !!}

</div>
</div>
