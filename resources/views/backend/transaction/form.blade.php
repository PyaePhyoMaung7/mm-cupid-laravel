@extends('backend.master')
@section('title', 'Transaction')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Transaction</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Transaction details</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            @if (isset($transaction))
                                <div class="d-flex justify-content-center align-items-center mb-3 mx-auto" style="width: 400px;">
                                    <a href="{{ asset('storage/transactions/' . $transaction->member_id . '/' . $transaction->name) }}" target="_blank">
                                        <img class="w-100" src="{{ asset('storage/transactions/' . $transaction->member_id . '/' . $transaction->name) }}"
                                        alt="">
                                    </a>
                                </div>
                                <div>
                                    <form id="demo-form2" action="{{ route('point.update') }}"
                                        class="form-horizontal form-label-left" method="POST">
                                        <input type="hidden" name="id" value="{{ $transaction->member_id }}">

                                        @csrf
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="point">New
                                                Point
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="number" id="point" name="point"
                                                    value="{{ old('point') }}" class="form-control"
                                                    placeholder="Enter Point">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <h3>There is no transaction
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /page content -->
@endsection

@section('javascript')
    @if ($errors->has('point'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ $errors->first('point') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif
@endsection
