@extends('backend.master')
@section('title', isset($setting) ? 'Setting Update' : 'Setting Create')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($setting) ? 'Update Setting' : 'Create Setting' }}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Setting info</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            @if (isset($setting))
                                <form id="demo-form2" action="{{ route('setting.update') }}"
                                    class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="{{ $setting->id }}">
                                @else
                                    <form id="demo-form2" action="{{ route('setting.store') }}"
                                        class="form-horizontal form-label-left" method="POST"
                                        enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="point">Point <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="point" name="point"
                                        value="{{ old('point', isset($setting) ? $setting->point : '') }}"
                                        class="form-control" placeholder="Enter points">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-name">Company name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company-name" name="company-name"
                                        value="{{ old('company-name', isset($setting) ? $setting->company_name : '') }}"
                                        class="form-control" placeholder="Enter company name">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-email">Company
                                    email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company-email" name="company-email"
                                        value="{{ old('company-email', isset($setting) ? $setting->company_email : '') }}"
                                        class="form-control" placeholder="Enter company email">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-phone">Company
                                    phone <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company-phone" name="company-phone"
                                        value="{{ old('company-phone', isset($setting) ? $setting->company_phone : '') }}"
                                        class="form-control" placeholder="Enter company phone">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-address">Company
                                    address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company-address" name="company-address"
                                        value="{{ old('company-address', isset($setting) ? $setting->company_address : '') }}"
                                        class="form-control" placeholder="Enter company address">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Company logo <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div id="preview-image" class="overflow-hidden position-relative"
                                        style="border:1px dashed grey; border-radius: 10px; width: 300px; height: 300px;">
                                        @if (isset($setting))
                                            <img src="{{ url('storage/images/' . $setting->company_logo) }}"
                                                class="w-100 h-100" style="object-fit: cover" alt="Image Preview"
                                                onclick="browseImage()" />
                                            <label for="" onclick="browseImage('3')"
                                                class="btn btn-dark p-2 rounded-3 position-absolute z-3 change-photo change-photo3"
                                                style="opacity: 0.6; top:42%; left:38%;">Change</label>
                                        @else
                                            <label id="choose-file-label" onclick="browseImage()"
                                                style="margin-top: 30%; margin-bottom: 30%; margin-left:35%; cursor: pointer; font-size: 20px;">Choose
                                                file</label>
                                        @endif
                                    </div>
                                    <input class="d-none" type="file" id="company-logo" name="company-logo"
                                        onchange="previewImage()" value="" class="form-control"
                                        placeholder="Enter company logo">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    @if (!isset($setting))
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                    @endif
                                    <button type="submit"
                                        class="btn btn-success">{{ isset($setting) ? 'Update' : 'Create' }}</button>
                                </div>
                            </div>
                            </form>
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
        console.log($('#company-logo').value);

        function browseImage() {
            $('#company-logo').click();
        }

        function previewImage() {
            const fileInput = document.getElementById('company-logo');
            const preview = document.getElementById('preview-image');

            let fileName = fileInput.value.split('\\').pop();
            let fileExtension = fileName.split('.').pop();
            let allow_extensions = ['jpg', 'jpeg', 'png', 'giff', 'webp', 'avif'];

            let file = event.target.files[0];
            console.log(file);

            if (allow_extensions.includes(fileExtension)) {
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let imgSrc = event.target.result;
                        preview.innerHTML =
                            `<img src= ${imgSrc} class="w-100 h-100" style="object-fit: cover" alt="Image Preview" onclick="browseImage()"/>
                            <label for="" onclick="browseImage('3')"
                            class="btn btn-dark p-2 rounded-3 position-absolute z-3 change-photo change-photo3"
                            style="opacity: 0.6; top:42%; left:42%;">Change</label>`;
                    };
                    reader.readAsDataURL(file);
                    preview.style.display = "";
                    $('#choose-file-label').hide();
                }
            } else {
                $('#company-logo').val('');
                preview.style.display = "";
                preview.style.width = '300px';
                preview.innerHTML = `
                <h4 class="bg-danger text-white text-center py-2">Your uploaded file type is not accepted!</h4>
                <label id="choose-file-label" onclick="browseImage()" style="margin-top: 30%; margin-left:30%; cursor: pointer; font-size: 20px;">Choose file</label>
                `;
            };
        }

        function showErrorMessage(error) {
            new PNotify({
                title: 'Oh No!',
                text: error,
                type: 'error',
                styling: 'bootstrap3'
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($errors->all() as $error)
                showErrorMessage("{{ $error }}");
            @endforeach
        });
    </script>

@endsection
