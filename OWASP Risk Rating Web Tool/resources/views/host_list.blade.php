@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 style="text-align: center">Hosts</h3>
                    <a href="{{ URL::to('/host/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Host</a>
                    <a href="{{ URL::to('/factor/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Risk Rating</a>
                </div>
                <div class="box-body no-padding">
                    @if (Session::has('status'))
                        <?php $status = Session::get('status'); ?>
                        @if ($status == 'failed')
                            <div class="alert alert-danger alert-dismissible" style="border-radius: 0">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                            </div>
                        @else
                            <div class="alert alert-success alert-dismissible" style="border-radius: 0">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success!</h4>
                            </div>
                        @endif
                    @endif
                    <table class="table table-striped" style="margin-bottom: 20px">
                        <tr>
                            <th style="width: 10%; text-align: center">#</th>
                            <th>Host Name</th>
                            <th style="width: 20%; text-align: center">Summary</th>
                            <th style="width: 20%; text-align: center">Action</th>
                        </tr>
                        @if($host != null)
                            <?php $count = 1; ?>
                            @foreach($host as $item)
                                <tr>
                                    <td style=" text-align: center">{{ $count }}</td>
                                    <td>{{ $item->host_name }}</td>
                                    <td style="text-align: center">
                                        <a href="#" onclick="get_factor({{ $item->id_host }})">{{ ucfirst($item->summary) }}</a>
                                    </td>
                                    <td style=" text-align: center">
                                        <a href="{{ URL::to('/host/update/'.$item->id_host) }}" class="btn btn-sm btn-warning">Update</a>
                                        <a href="{{ URL::to('/host/delete/'.$item->id_host) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this data?')">Delete</a>
                                    </td>
                                </tr>
                                <?php $count++; ?>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" style="text-align: center">No data available</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function get_factor(id_host){
            $.ajax({
                url: "{{ URL::to('/factor/get') }}/" + id_host,
                type: "GET",
                dataType: "html",
                complete: function(msg) {
                    $('.modal-title').html('Detail Factor');
                    $('.modal-body').html(msg.responseText);
                    $('#myModal').modal('show');
                }
            });
        }
    </script>
@stop