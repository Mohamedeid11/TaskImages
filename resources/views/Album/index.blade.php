@extends('adminLte.main')

@section('title' , 'Abum')

@section('content')
    <div class="container-fluid m-2" xmlns="http://www.w3.org/1999/html">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div class="card-box">
                    <div class="card-header bg-white font-24 text-center">
                            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#addAlbum">
                                Add New Album
                            </button>
                        Album
                        <div class="float-right font-21 p-2 card"> All Albums {{count($albums)}}</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr bgcolor="#f0f8ff">
                                <th>N</th>
                                <th class="text-center">Album Name</th>
                                <th class="text-center">N.images</th>
                                <th class="text-center">Modify</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($albums) > 0)
                                @foreach($albums as $key =>$album)
                                    <tr>
                                        <th scope="row">{{ $key++}}</th>
                                        <td class="text-center"><a href="{{route('album.show', $album->id)}}">{{$album->name}}</a></td>
                                        <td class="text-center">{{$album ->images()->count()}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn btn-sm mr-2"
                                                    data-toggle="modal"
                                                    data-target="#edit"
                                                    data-id ='{{$album->id}}'
                                                    data-name ='{{$album->name}}'>
                                                <i class="fas fa-edit"></i>  Edit
                                            </button>
                                            /
                                            @if(($album ->images()->count()) > 0)
                                            <button type="button" class="btn btn-danger btn btn-sm ml-2" id="albumID"
                                                    data-toggle="modal"
                                                    data-target="#delete"
                                                    data-id="{{$album->id}}">
                                                <i class="fas fa-trash-alt"> Delete </i>
                                            </button>
                                                /
                                                <button type="button" id="move" class="btn btn-success btn btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#move_album"
                                                        data-id = {{$album->id}}>
                                                    <i class="fas fa-edit"></i>  Move
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger btn btn-sm ml-2" id="albumID"
                                                        data-toggle="modal"
                                                        data-target="#delete-all"
                                                        data-id="{{$album->id}}">
                                                    <i class="fas fa-trash-alt"> Delete</i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                {{$albums->links()}}
            </div>
        </div>

        <!-- Modal for Add Album -->
        <div class="modal fade" id="addAlbum" tabindex="-1" role="dialog" aria-labelledby="addAlbum" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Adding New Album</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('album.store')}}" method="post" >
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Album Name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--    End Add Album Model--}}


        {{-- Edit Model--}}
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit The Album</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('album.update' , $album)}}" method="post" >
                        <div class="modal-body">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="album_id" id="album-id" value="">
                            <div class="form-group">
                                <input type="text" name ="name" id="name" class="form-control" placeholder="Enter Album Name">
                            </div>
                        </div>
                        <div class ="modal-footer ">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--    End Of Edit model--}}

        <!-- Modal for Delete all Album -->
        <div class="modal fade"  id="delete-all" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('album.destroy', $album->id)}}" method="post" >
                        <div class="modal-body">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="album_id" id="album-id" value="">
                            <h4> You Sure to delete this Album!!! </h4>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--    End Delete Album Model--}}


        <!-- Modal for Delete Album -->
        <div class="modal fade"  id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('album.destroy', $album->id)}}" method="post" >
                            <div class="modal-body">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="album_id" id="album-id" value="">
                                <h4> be careful what to do with Album Images !! </h4>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        {{--    End Delete Album Model--}}

    <!-- Modal for Move Images   -->
        <div class="modal fade" id="move_album" tabindex="-1" role="dialog" aria-labelledby="move_album" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Adding New Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('gallery.move')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="old_album_id" id="old_album_id" value="">

                        <label for="exampleInputPassword1"> Select The Album </label>
                        <select class="form-control" name="new_album_id" id="new_album_id">
                            @if (count($albums) > 0)
                                {{$rows = $albums}}
                                @foreach($rows as $album)
                                    <option  value="{{$album->id}}">{{$album->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{--     End Move Imges Model--}}

    </div>

@endsection
