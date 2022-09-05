@extends('adminLte.main')

@section('title' , 'Album\Gallery')

@section('content')

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a  class="navbar-brand d-flex align-items-center">
                    <strong> <i class="fas fa-camera"> Album  </i>  </strong>
                </a>
            </div>
        </div>
    </header>
            {{--    Album Area --}}
    <div class="row justify-content-center m-3">
        <div class="col-md-3 col-xl-4">
                <h1>  <p class="text-center text-bold"> {{ $album->name}}</h1></p>
        </div>
    </div>

    {{--    End Of Album Area--}}


    {{--    DropZone Area--}}

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title text-center">Select Image</h3>
        </div>
        <div class="card-body">
            <form id="dropzoneForm" class="dropzone" action="{{ route('gallery.store')}}">
                @csrf
                <input type="hidden" name="album_id" id="album_id" value="{{$album->id}}">
                <input type="hidden" name="album_name" id="album_name" value="{{$album->name}}">
            </form>
            <div align="center">
                <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>

            <br />
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title text-center">Uploaded Image</h3>
                </div>
                <div class="card-body" id="uploaded_image">
                    <div class="row">
                        @foreach($album->images  as $image)
                            <div class="col-md-2" style="margin-bottom:16px;" align="center">

                                <img src="{{asset('/Images/' . $album->name . '/' . $image->image)}}" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                                <p class="text-center text-bold mb-3 text-capitalize"> {{$image->name}}</p>

                                <a href="{{route('gallery.delete' , $image->id)}}">
                                    <button type="button" class="btn btn-link remove_image" >Remove</button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    End Of Drop Zone Area--}}

@endsection
