@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 style="text-align: center">Categories</h3>
                    <a href="{{ URL::to('/category/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Category</a>
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
                            <th>Category Name</th>
                            <th style="width: 20%; text-align: center">Action</th>
                        </tr>
                        @if($category != null)
                            <?php $count = 1; ?>
                            @foreach($category as $item)
                                <tr>
                                    <td style=" text-align: center">{{ $count }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td style=" text-align: center">
                                        <a href="{{ URL::to('/category/update/'.$item->id_category) }}" class="btn btn-sm btn-warning">Update</a>
                                        <a href="{{ URL::to('/category/delete/'.$item->id_category) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this data?')">Delete</a>
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
@stop