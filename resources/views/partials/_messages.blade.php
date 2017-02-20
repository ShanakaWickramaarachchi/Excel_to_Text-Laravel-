@if(Session:: has('Success'))

<h1> shanaka</h1>{{Session::get('sucess')}}

    @endif


@if(count($errors)>0)


        <strong> Errors: </strong>
        <ul>
            @foreach($errors-> all()as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>

  @endif






