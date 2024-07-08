@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ
@endsection
@section('title', 'MMCupid :: Register')
@section('content')
    <div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
        <div class="row">
            <div class="col"></div>

            <div class="col-10 col-sm-8 col-md-6 col-lg-5">
                <h1 class="fw-bold text-center" style="font-size: 60px">Sign up</h1>
                <div class="py-3 text-center" style="font-size: 14px;">
                    Already have an account? <a href="{{ url('/login') }}" class="text-decoration-none text-primary">Log in</a>
                </div>
                <div class="fw-medium text-center" style="font-size: 14px;">Sign up with your email or phone number</div>

                <form id="register-form" action="{{ route('register') }}" method="POST"
                    enctype="multipart/form-data">
                    <div ng-if="user_info">
                        <input type="text"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" placeholder="Enter User Name" name="username" id="username"
                            ng-model="username" ng-blur="validate('username')" ng-change="checkValidation('username');" />
                        <p class="text-danger" ng-if="username_error">@{{ username_error_msg }}</p>

                        <input type="text"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" placeholder="Enter Email" name="email" id="email" ng-model="email"
                            ng-blur="validate('email'); checkEmailExist()" ng-change="checkValidation('email');" />
                        <p class="text-danger" ng-if="email_error">@{{ email_error_msg }}</p>

                        <div class="position-relative">
                            <input type="password"
                                class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                                style="width:100%;" placeholder="Enter Password" name="password" id="password"
                                ng-model="password" ng-blur="validate('password')"
                                ng-change="checkValidation('password');" />
                            <i class="fa fa-eye-slash position-absolute top-0 end-0 mt-3 me-3 fs-5" id="password-icon"
                                ng-mousedown="openPassword('password')" ng-mouseup="closePassword('password')"></i>
                            <p class="text-danger" ng-if="password_error">@{{ password_error_msg }}</p>
                        </div>

                        <div class="position-relative">
                            <input type="password"
                                class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                                style="width:100%;" placeholder="Enter Confirm Password" name="confirm-password"
                                id="confirm-password" ng-model="confirm_password" ng-blur="validate('confirm_password')"
                                ng-change="checkValidation('confirm_password');" />
                            <i class="fa fa-eye-slash position-absolute top-0 end-0 mt-3 me-3 fs-5"
                                id="confirm-password-icon" ng-mousedown="openPassword('confirm-password')"
                                ng-mouseup="closePassword('confirm-password')"></i>
                                <p class="text-danger" ng-if="confirm_password_error">@{{ confirm_password_error_msg }}</p>
                                <p class="text-danger" ng-if="passwords_unmatch_error">@{{ passwords_unmatch_error_msg }}</p>
                        </div>


                        <input type="text"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" placeholder="Enter Phone" name="phone" id="phone" ng-model="phone"
                            ng-blur="validate('phone')" ng-change="checkValidation('phone');" />
                        <p class="text-danger" ng-if="phone_error">@{{ phone_error_msg }}</p>

                        <input type="text"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" placeholder="Enter Your Birthday" name="birthday" id="birthday"
                            ng-model="birthday" ng-blur="validate('birthday')" ng-change="checkValidation('birthday');" />
                        <p class="text-danger" ng-if="birthday_error">@{{ birthday_error_msg }}</p>

                        <select name="city" ng-model="city" id="city"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" ng-blur="validate('city')" ng-change="checkValidation('city');">
                            <option value="" selected>Choose City</option>
                            <option value="@{{ city . id }}" ng-repeat="city in cities">@{{ city . name }}</option>
                        </select>
                        <p class="text-danger" ng-if="city_error">@{{ city_error_msg }}</p>

                        <div class="d-flex justify-content-between">
                            <select name="hfeet" ng-model="hfeet" id="hfeet"
                                class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                                style="width:48%;" ng-blur="validate('hfeet')" ng-change="checkValidation('hfeet');">
                                <option value="" selected>feet</option>
                                <option value="4">4'</option>
                                <option value="5">5'</option>
                                <option value="6">6'</option>
                                <option value="7">7'</option>
                            </select>
                            <select name="hinches" ng-model="hinches" id="hinches"
                                class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                                style="width:48%;" ng-blur="validate('hinches')" ng-change="checkValidation('hinches');">
                                <option value="" selected>inches</option>
                                <option value='0'>0"</option>
                                <option value='1'>1"</option>
                                <option value='2'>2"</option>
                                <option value='3'>3"</option>
                                <option value='4'>4"</option>
                                <option value='5'>5"</option>
                                <option value='6'>6"</option>
                                <option value='7'>7"</option>
                                <option value='8'>8"</option>
                                <option value='9'>9"</option>
                                <option value='10'>10"</option>
                                <option value='11'>11"</option>
                            </select>
                        </div>
                        <p class="text-danger" ng-if="hfeet_error">@{{ hfeet_error_msg }}</p>
                        <p class="text-danger" ng-if="hinches_error">@{{ hinches_error_msg }}</p>

                        <textarea name="education" ng-model="education" id="education" cols="30" rows="3"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:100%;"
                            placeholder="Enter Your Education" ng-blur="validate('education')" ng-change="checkValidation('education')"></textarea>
                        <p class="text-danger" ng-if="education_error">@{{ education_error_msg }}</p>

                        <input type="text"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" placeholder="Please tell us about yourself" name="about"
                            id="about" ng-model="about" ng-blur="validate('about')"
                            ng-change="checkValidation('about')" />
                        <p class="text-danger" ng-if="about_error">@{{ about_error_msg }}</p>

                        <select name="religion" ng-model="religion" id="religion"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" ng-blur="validate('religion')" ng-change="checkValidation('religion');">
                            <option value="" selected>Choose your religion</option>
                            <option value="{{ getReligion('christian') }}">Christian</option>
                            <option value="{{ getReligion('islam') }}">Islam</option>
                            <option value="{{ getReligion('buddhist') }}">Buddhist</option>
                            <option value="{{ getReligion('hindu') }}">Hindu</option>
                            <option value="{{ getReligion('jain') }}">Jain</option>
                            <option value="{{ getReligion('shinto') }}">Shinto</option>
                            <option value="{{ getReligion('atheist') }}">Atheist</option>
                            <option value="{{ getReligion('other') }}">Other</option>

                        </select>
                        <p class="text-danger" ng-if="religion_error">@{{ religion_error_msg }}</p>


                        <p class="mt-2">Please choose your gender.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input gender" type="radio" id="male" name="gender"
                                ng-model="gender" value="{{ getGender('male') }}" ng-blur="validate('gender')"
                                ng-click="validate('gender')" ng-change="checkValidation('gender')">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input gender" type="radio" id="female" name="gender"
                                ng-model="gender" value="{{ getGender('female') }}" ng-blur="validate('gender')"
                                ng-click="validate('gender')" ng-change="checkValidation('gender')">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <p class="text-danger" ng-if="gender_error">@{{ gender_error_msg }}</p>

                        <p class="form-check-label mt-2" for="male">Please choose your hobbies.</p>
                        <div class="row ms-0">
                            <div class="col-6 col-md-4 form-check" ng-repeat="hobby in hobbies">
                                <input class="form-check-input hobby" name="hobbies[]" id="hobby-@{{ hobby . id }}"
                                    type="checkbox" value="@{{ hobby . id }}" ng-model="selected_hobbies"
                                    ng-blur="validate('selected-hobbies')"
                                    ng-change="checkValidation('selected-hobbies');">
                                <label class="form-check-label"
                                    for="hobby-@{{ hobby . id }}">@{{ hobby . name }}</label>
                            </div>
                        </div>
                        <p class="text-danger" ng-if="hobby_error">@{{ hobby_error_msg }}</p>

                        <p class="form-check-label d-block mt-2" for="male">Please choose your partner gender.</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input partner-gender" type="radio" id="partner-male"
                                name="partner-gender" ng-model="partner_gender" value="{{ getPartnerGender('male') }}"
                                ng-blur="validate('partner-gender')" ng-click="validate('partner-gender')"
                                ng-change="checkValidation('partner-gender')">
                            <label class="form-check-label" for="partner-male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input partner-gender" type="radio" id="partner-female"
                                name="partner-gender" ng-model="partner_gender" value="{{ getPartnerGender('female') }}"
                                ng-blur="validate('partner-gender')" ng-click="validate('partner-gender')"
                                ng-change="checkValidation('partner-gender')">
                            <label class="form-check-label" for="partner-female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input partner-gender" type="radio" id="partner-both"
                                name="partner-gender" ng-model="partner_gender" value="{{ getPartnerGender('both') }}"
                                ng-blur="validate('partner-gender')" ng-click="validate('partner-gender')"
                                ng-change="checkValidation('partner-gender')">
                            <label class="form-check-label" for="partner-both">Both</label>
                        </div>

                        <p class="text-danger" ng-if="partner_gender_error">@{{ partner_gender_error_msg }}</p>


                        <div class="d-flex justify-content-between">
                            <div style="width:48%;">
                                <select name="min-age" ng-model="min_age" id="min-age"
                                    class="form-control form-control-lg w-100 border border-1 border-black rounded rounded-4 mt-2"
                                    ng-blur="validate('min-age')" ng-change="chooseMinAge(); checkValidation('min-age');">
                                    <option value="" selected>Minimum Age</option>
                                    <option value='@{{ age }}' ng-repeat="age in min_ages">@{{ age }}
                                    </option>
                                </select>
                                <p class="text-danger text-center" ng-if="min_age_error">@{{ min_age_error_msg }}</p>
                            </div>

                            <div style="width:48%;">
                                <select name="max-age" ng-model="max_age" id="max-age"
                                    class="form-control form-control-lg w-100 border border-1 border-black rounded rounded-4 mt-2"
                                    ng-blur="validate('max-age')" ng-change="chooseMaxAge(); checkValidation('max-age');">
                                    <option value="" selected>Maximum Age</option>
                                    <option value='@{{ age }}' ng-repeat="age in max_ages">@{{ age }}
                                    </option>
                                </select>
                                <p class="text-danger text-center" ng-if="max_age_error">@{{ max_age_error_msg }}</p>
                            </div>
                        </div>

                        <textarea name="work" ng-model="work" id="work" cols="30" rows="3"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:100%;"
                            ng-blur="validate('work')" ng-change="checkValidation('work');" placeholder="Enter Your Occupation"></textarea>
                        <p class="text-danger" ng-if="work_error">@{{ work_error_msg }}</p>

                        <button type="button" ng-click="next()" disabled id="next-btn"
                            class="btn btn-dark rounded rounded-5 btn-lg mt-4" style="width:100%;">
                            Next
                        </button>
                    </div>

                    <div ng-if="user_photo">
                        {{-- <?php
                      if($error){
                  ?>
                        <p class="bg-danger text-white">
                            <?php echo $error_message; ?>
                        </p>
                        <?php
                      }
                  ?> --}}
                        <table class="mt-2"
                            style="width: 100%; border-collapse: separate; border-spacing: .5em; table-layout: fixed">
                            <tr>
                                <td class="" colspan="2" rowspan="2">
                                    <div class="bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center"
                                        ng-click="browseFile()" style="height: 48vh;">
                                        <div id="preview1" class="d-none w-100 h-100"></div>
                                        <label for="" onclick="browseImage('1')"
                                            class="btn btn-dark p-2 rounded-3 hide position-absolute change-photo change-photo1"
                                            style="opacity: 0.8">Change</label>
                                        <span class="position-absolute rounded-circle shadow-sm bg-white text-center" style="top:1%; left:1%; z-index: 10; width: 25px; height: 25px;">1</span>
                                        <i class="fa fa-upload fs-4" style="cursor: pointer" id="upload-icon-1"
                                            onclick="browseImage('1')"></i>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center"
                                        style="height: 23vh;">
                                        <div id="preview2" class="d-none w-100 h-100"></div>
                                        <label for="" onclick="browseImage('2')"
                                            class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo2"
                                            style="opacity: 0.8">Change</label>
                                        <span class="position-absolute rounded-circle shadow-sm bg-white text-center" style="top:1%; left:1%; z-index: 10; width: 25px; height: 25px;">2</span>
                                        <i class="fa fa-upload fs-4" onclick="browseImage('2')" style="cursor: pointer"
                                            id="upload-icon-2"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    <div class="bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center"
                                        style="height: 23vh;">
                                        <div id="preview3" class="d-none w-100 h-100"></div>
                                        <label for="" onclick="browseImage('3')"
                                            class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo3"
                                            style="opacity: 0.8">Change</label>
                                        <span class="position-absolute rounded-circle shadow-sm bg-white text-center" style="top:1%; left:1%; z-index: 10; width: 25px; height: 25px;">3</span>
                                        <i class="fa fa-upload fs-4" onclick="browseImage('3')" style="cursor: pointer"
                                            id="upload-icon-3"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    <div class="bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center"
                                        style="height: 23vh;">
                                        <div id="preview4" class="d-none w-100 h-100"></div>
                                        <label for="" onclick="browseImage('4')"
                                            class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo4"
                                            style="opacity: 0.8">Change</label>
                                        <span class="position-absolute rounded-circle shadow-sm bg-white text-center" style="top:1%; left:1%; z-index: 10; width: 25px; height: 25px;">4</span>
                                        <i class="fa fa-upload fs-4" onclick="browseImage('4')" style="cursor: pointer"
                                            id="upload-icon-4"></i>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center"
                                        style="height: 23vh;">
                                        <div id="preview5" class="d-none w-100 h-100"></div>
                                        <label for="" onclick="browseImage('5')"
                                            class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo5"
                                            style="opacity: 0.8">Change</label>
                                        <span class="position-absolute rounded-circle shadow-sm bg-white text-center" style="top:1%; left:1%; z-index: 10; width: 25px; height: 25px;">5</span>
                                        <i class="fa fa-upload fs-4" onclick="browseImage('5')" style="cursor: pointer"
                                            id="upload-icon-5"></i>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center"
                                        style="height: 23vh;">
                                        <div id="preview6" class="d-none w-100 h-100"></div>
                                        <label for="" onclick="browseImage('6')"
                                            class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo6"
                                            style="opacity: 0.8">Change</label>
                                        <span class="position-absolute rounded-circle shadow-sm bg-white text-center" style="top:1%; left:1%; z-index: 10; width: 25px; height: 25px;">6</span>
                                        <i class="fa fa-upload fs-4" onclick="browseImage('6')" style="cursor: pointer"
                                            id="upload-icon-6"></i>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="file" name="upload1" id="upload1" onchange="previewImage('1')"
                            class="d-none">
                        <input type="file" name="upload2" id="upload2" onchange="previewImage('2')"
                            class="d-none">
                        <input type="file" name="upload3" id="upload3" onchange="previewImage('3')"
                            class="d-none">
                        <input type="file" name="upload4" id="upload4" onchange="previewImage('4')"
                            class="d-none">
                        <input type="file" name="upload5" id="upload5" onchange="previewImage('5')"
                            class="d-none">
                        <input type="file" name="upload6" id="upload6" onchange="previewImage('6')"
                            class="d-none">
                        <button type="button" ng-click="register()" disabled id="register-btn"
                            class="btn btn-dark rounded rounded-5 btn-lg mt-4" style="width:100%;">
                            Register
                        </button>

                        <input type="hidden" name="form-sub" value="1">
                        <input type="hidden" id="member-id" name="member-id">
                        <input type="hidden" id="email-confirm-code" name="email-confirm-code">

                    </div>

                </form>

                <p class="w-100 mt-4 fw-medium text-center" style="font-size: 12px; line-height:16px;">By signing up, you
                    agree to our
                    <a href="" class="text-black">Terms & Conditions</a>. Learn how we
                    use your data in our
                    <a href="" class="text-black">Privacy Policy</a>
                </p>
            </div>

            <div class="col"></div>
        </div>
    </div>
@endsection
@section('javascript')
    <!-- PNotify -->
    <script src="{{ url('assets/js/pnotify/pnotify.js') }}"></script>

    <script>
        let today_date = new Date();
        let last_18_years_ago_date;
        if (today_date.getFullYear() % 4 == 0 && today_date.getMonth() == 1 && today_date.getDate() == 29) {
            last_18_years_ago_date = new Date(today_date.getFullYear() - 18, today_date.getMonth(), today_date.getDate() -
                1);
        } else {
            last_18_years_ago_date = new Date(today_date.getFullYear() - 18, today_date.getMonth(), today_date.getDate());
        }
        $(function() {
            $("#birthday").datepicker({
                changeYear: true,
                changeMonth: true,
                dateFormat: 'yy-mm-dd',
                maxDate: last_18_years_ago_date,
                yearRange: "-60:+0"
            });

            $("#birthday").prop('readonly', true);

        });

        function browseImage(index) {
            $('#upload' + index).click();
        }

        function previewImage(index) {

            const fileInput = document.getElementById('upload' + index);
            const preview = document.getElementById('preview' + index);

            let fileName = fileInput.value.split('\\').pop();
            let fileExtension = fileName.split('.').pop();

            let allow_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            let file = event.target.files[0];

            if (allow_extensions.includes(fileExtension)) {
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let imgSrc = event.target.result;
                        preview.innerHTML =
                            `<img src= ${imgSrc} class="" style="width: 100%; height: 100%; object-fit: cover" alt="Image Preview"/>`;
                    };
                    reader.readAsDataURL(file);
                    preview.style.display = "";
                    $('#upload-icon-' + index).hide();
                    $('.change-photo' + index).show();
                    $('#preview' + index).removeClass('d-none');
                }
            } else {
                $('#upload' + index).val('');
                $('#preview' + index).innerHTML = "";
                $('.change-photo' + index).hide();
                $('#upload-icon-' + index).show();
                $('#preview' + index).addClass('d-none');

                new PNotify({
                title: 'Sorry!',
                text: 'Your uploaded file type is not accepted.',
                width: '350px',
                type: 'error',
                styling: 'bootstrap3'
                });
            };

            const upload1_value = document.getElementById('upload1').value;

            if (upload1_value != "") {
                $('#register-btn').prop('disabled', false);
            } else {
                new PNotify({
                title: 'Reminder!',
                text: 'Please upload a photo in the biggest square area.',
                width: '350px',
                type: 'error',
                styling: 'bootstrap3'
                });
                $('#register-btn').prop('disabled', true);
            }
        }
    </script>
    <script src="{{ url('assets/front/js/register.js?v=20240628') }}"></script>
@endsection
