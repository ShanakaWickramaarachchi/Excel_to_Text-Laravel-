@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="container-fluid">
                    <h2>Excel File Uploader</h2>


                    <div class="jumbotron">
                        <h4>1)Upload your Excel.xsl file here</h4>

                        <form action='upload' method='POST' enctype='multipart/form-data'>
               
               {{ csrf_field()}}
               
                            <input type='file' name='userFile' ><br>

                            <input type='submit'   button class="btn btn-primary" name='upload_btn' value='Upload'  id="myButton">
                            </button>
                        </form>
                        <br>
                        <h4>2)Download the text file to your computer</h4>
                        
                        <a href="{{ url('xx') }}">
                  
                            <button type="button" class="btn btn-primary">Download
                            </button>

                        </a>

                    </div>
            



                            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>
            </div>
        </div>
    </div>
</div>
@endsection
