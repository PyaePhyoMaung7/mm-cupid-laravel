@extends('backend.master')
@section('title', 'Hobby List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hobby List</h3>
                </div>
            </div>

            <div class="row" style="display: block;">

                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content position-relative">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings text-center">
                                            <th class="column-title">Hobby</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($hobbies as $hobby)
                                            <tr class="even pointer text-center">
                                                <td class="col-7 align-middle">{{ $hobby->name }}</td>
                                                <td class="col-2 align-middle">
                                                    <a href="{{ url('admin-backend/hobby/edit/' . $hobby->id) }}"><button
                                                            type="button" class="btn btn-success btn-sm"><i
                                                                class="fa fa-pencil"></i>
                                                            Edit</button></a>
                                                    <a href="{{ url('admin-backend/hobby/delete/' . $hobby->id) }}"><button
                                                            type="button" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i>
                                                            Delete</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                @if (count($hobbies) <= 0)
                                    <h3 class="text-center mt-5">There is no hobby
                                @endif
                                <div class="mt-3 position-absolute" style="bottom: 0; right: 0;">
                                    {{ $hobbies->onEachSide(2)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section('javascript')
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;

                }
            });
        }
    </script>
@endsection
