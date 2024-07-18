var app = angular.module("myApp", []);

app.controller('myCtrl', function($scope, $http, $window){
    $scope.member           = {};
    $scope.member_edit      = {};
    $scope.member_images    = [];
    $scope.cities           = [];
    $scope.hobbies          = [];
    $scope.loading          = false;
    $scope.min_ages         = [];
    $scope.max_ages         = [];
    $scope.process_error    = false;
    $scope.streaming        = false;
    $scope.member_status    = undefined;
    $scope.inviters         = [];
    $scope.all_images       = [];
    $scope.image_arr        = [];
    $scope.inviter_index    = undefined;

    $scope.init = function () {
        $('.loading').show();
        $http({
            method: 'GET',
            url: base_url+'/api/member',
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                console.log(response);
                if(response.status == "200") {
                    $scope.member       = response.data.data;
                    console.log($scope.member);
                    $scope.inviters     = response.data.data.sent_date_requests;
                    $scope.changeMemberHobbies($scope.member.hobbies);
                    $scope.bindImages($scope.member.images);
                    $scope.getCities();
                    $scope.getHobbies();
                    $scope.bindInfo();
                    $('.loading').hide();
                }
            }
        )
    }

    $scope.update = function () {
        $('.loading').show();
        console.log($scope.member_edit);
        $http({
            method: 'POST',
            url: base_url+'/api/member/update',
            data: $scope.member_edit,
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                if(response.status = '200') {
                    $scope.init();
                    $scope.backUserProfile();
                    $('.loading').hide();
                }
            }
        );
    }

    $scope.bindImages = function (images) {
        console.log(images);
        images.forEach(image => {
            $('#preview'+image.sort).html(`
                <img src= ${image.image} class="" style="width: 100%; height: 100%; object-fit: cover" alt="Image Preview"/>
            `);
            if(image.sort != 1){
                $('#delete-btn-'+image.sort).removeClass('d-none');
            }
            $('#upload-icon-'+image.sort).hide();
            $('.change-photo'+image.sort).show();
            $('#preview'+image.sort).removeClass('d-none');
        });
        $('#update-photo-btn').prop('disabled', true);
    }

    $scope.bindInfo = function () {
        $scope.min_ages             = [];
        $scope.max_ages             = [];
        for (let i = 18; i <= $scope.member.partner_max_age; i++) {
            $scope.min_ages.push(i);
        }

        for (let i = $scope.member.partner_min_age; i <= 55; i++) {
            $scope.max_ages.push(i);
        }

        $scope.member.city_id += '';
        $scope.member.hfeet += '';
        $scope.member.hinches += '';

        $scope.member.partner_min_age += '';
        $scope.member.partner_max_age += '';

        $scope.member.religion += '';
        $scope.member.gender += '';
        $scope.member.partner_gender += '';
        $scope.member_edit  = angular.copy($scope.member);
        $scope.member_edit.city_id  = $scope.member_edit.city.id;
    }

    $scope.backUserProfile = function () {
        $scope.stopStream($scope.stream);
        $('#user-profile-btn').click();
        $('#video').hide();
        $('#take-photo').hide();
        $('#open-camera').show();
    }

    $scope.getCities = function () {
        $http({
            method: 'GET',
            url: base_url+'/api/cities',
        }).then(
            function (response) {
                $scope.cities = response.data.data;
            }
        )
    }

    $scope.getHobbies = function () {
        $http({
            method: 'GET',
            url: base_url+'/api/hobbies',
        }).then(
            function (response) {
                $scope.hobbies = response.data.data;
                console.log($scope.member.hobbies);
                $scope.hobbies.forEach(hobby => {
                    if($scope.member.hobbies.includes(hobby.id)) {
                        hobby.checked = true;
                    }else{
                        hobby.checked = false;
                    }
                })
                console.log($scope.hobbies);
            }
        )
    }

    $scope.changeMemberHobbies = function (hobbies) {
        let hobby_arr = [];
        hobbies.forEach(hobby => {
            hobby_arr.push(hobby.hobby_id);
        })
        $scope.member.hobbies = hobby_arr;
    }

    $scope.chooseMinAge = function () {
        $scope.max_ages = [];
        if($scope.member_edit.partner_min_age == ''){
            for (let i = 18; i <= 55; i++) {
                $scope.max_ages.push(i);
            }
        }else{
            for (let i = $scope.member_edit.partner_min_age; i <= 55; i++) {
                $scope.max_ages.push(i);
            }
        }
        $scope.validate();
    }

    $scope.chooseMaxAge = function () {
        $scope.min_ages = [];
        if($scope.member_edit.partner_max_age == ""){
            for (let i = 18; i <= 55; i++) {
                $scope.min_ages.push(i);
            }
        }else{
            for (let i = 18; i <= $scope.member_edit.partner_max_age; i++) {
                $scope.min_ages.push(i);
            }
        }
        $scope.validate();
    }

    $scope.validate = function () {
        $scope.process_error = false;
        if($scope.member_edit.username == ""){
            $scope.process_error        = true;
            $scope.username_error       = true;
            $scope.username_error_msg   = error_messages.A0001+ ' your user name.';
        }else{
            $scope.username_error       = false;
            $scope.username_error_msg   = '';
        }
        if($scope.member_edit.phone == ""){
            $scope.process_error        = true;
            $scope.phone_error          = true;
            $scope.phone_error_msg      = error_messages.A0001+ ' your phone number.';
        }else{
            $scope.phone_error          = false;
            $scope.phone_error_msg      = '';
        }

        if($scope.member_edit.city_id == ""){
            $scope.process_error        = true;
            $scope.city_error           = true;
            $scope.city_error_msg       = error_messages.A0003+ ' your city.';
        }else{
            $scope.city_error           = false;
            $scope.city_error_msg       = '';
        }

        if($scope.member_edit.hfeet == ""){
            $scope.process_error        = true;
            $scope.hfeet_error          = true;
            $scope.hfeet_error_msg      = error_messages.A0003+ ' your height (feet).';
        }else{
            $scope.hfeet_error          = false;
            $scope.hfeet_error_msg      = '';
        }

        if($scope.member_edit.hinches == ""){
            $scope.process_error        = true;
            $scope.hinches_error        = true;
            $scope.hinches_error_msg    = error_messages.A0003+ ' your height (inches).';
        }else{
            $scope.hinches_error        = false;
            $scope.hinches_error_msg    = '';
        }

        if($scope.member_edit.education == ""){
            $scope.process_error        = true;
            $scope.education_error      = true;
            $scope.education_error_msg  = error_messages.A0001+ ' your education level.';
        }else{
            $scope.education_error      = false;
            $scope.education_error_msg  = '';
        }

        if($scope.member_edit.about == ""){
            $scope.process_error        = true;
            $scope.about_error          = true;
            $scope.about_error_msg      = error_messages.A0001+ ' something about yourself.';
        }else{
            $scope.about_error          = false;
            $scope.about_error_msg      = '';
        }

        if($scope.member_edit.religion == ""){
            $scope.process_error        = true;
            $scope.religion_error       = true;
            $scope.religion_error_msg   = error_messages.A0003+ ' your religion.';
        }else{
            $scope.religion_error       = false;
            $scope.religion_error_msg   = '';
        }

        $scope.member_edit.hobbies = [];
        $(".hobby:checked").each(function(){
            $scope.member_edit.hobbies.push($(this).val());
        });
        console.log($scope.member_edit.hobbies);
        if($scope.member_edit.hobbies.length <= 0){
            $scope.process_error    = true;
            $scope.hobby_error      = true;
            $scope.hobby_error_msg  = error_messages.A0003+ ' at least one hobby.';
        }else{
            $scope.hobby_error      = false;
            $scope.hobby_error_msg  = '';
        }

        if($scope.member_edit.partner_min_age == ""){
            $scope.process_error        = true;
            $scope.min_age_error        = true;
            $scope.min_age_error_msg    = error_messages.A0003+ ' minimum age.';
        }else{
            $scope.min_age_error        = false;
            $scope.min_age_error_msg    = '';
        }

        if($scope.member_edit.partner_max_age == ""){
            $scope.process_error        = true;
            $scope.max_age_error        = true;
            $scope.max_age_error_msg    = error_messages.A0003+ ' maximum age.';
        }else{
            $scope.max_age_error        = false;
            $scope.max_age_error_msg    = '';
        }

        if($scope.member_edit.work == ""){
            $scope.process_error    = true;
            $scope.work_error       = true;
            $scope.work_error_msg   = error_messages.A0001+ ' your occupation.';
        }else{
            $scope.work_error       = false;
            $scope.work_error_msg   = '';
        }

        if($scope.process_error){
            $('#update-details-btn').prop('disabled',true);
        }else{
            $('#update-details-btn').prop('disabled',false);
        }
    }

    $scope.updatePhoto = function () {
        $('.loading').show();
        const extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        for (let i = 1; i <= 6; i++) {
            const input = $('#upload'+i)[0];
            if(input.files && input.files.length > 0) {
                const fileName = input.files[0].name;
                const fileExtension = fileName.split('.').pop().toLowerCase();
                if(extensions.includes(fileExtension)) {
                    const url = base_url + '/api/member/photo/update';
                    const fileInput = document.getElementById('upload'+i);
                    const file = fileInput.files[0];
                    let form_data = new FormData();
                    form_data.append('file', file);
                    form_data.append('sort', i);
                    $http({
                        method: 'POST',
                        url: url,
                        data: form_data,
                        headers: {
                          'Content-Type': undefined
                        }
                    }).then(
                        function (response) {
                            if(response.data.success) {
                                $scope.init();
                            }
                        },
                        function (error) {
                            alert('Sorry! Something went wrong while saving you photos');
                        }
                    );
                }else{
                    alert('Your uploaded file type is not supported!');
                }
            }
        }
        $('.loading').hide();
    }

    $scope.deletePhoto = function (sort) {
        $value = $('#upload'+sort).val();
        if($value == '') {
            $('.loading').show();
            $http({
                method: 'POST',
                url: base_url+'/api/member/photo/delete',
                data: {'sort' : sort},
                headers: {
                  'Content-Type': 'application/json'
                }
            }).then(
                function (response) {
                    console.log(response);
                    if(response.data.success) {
                        $scope.discardPhoto(sort);
                        $('.loading').hide();
                    }
                }
            )
        } else {
            $scope.discardPhoto(sort);
        }
    }

    $scope.discardPhoto = function (sort) {
        $('#upload'+sort).val('');
        $('#preview'+sort).html('');
        $('#upload-icon-'+sort).show();
        $('.change-photo'+sort).hide();
        $('#preview'+sort).addClass('d-none');
        $('#delete-btn-'+sort).addClass('d-none');
    }

    $scope.confirmDelete = function (sort){
        Swal.fire({
            title: "Delete confimation",
            text: "Are you sure to delete this photo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
               $scope.deletePhoto(sort);
            }
        });
    }

    $scope.confirmUpdatePhoto = function (sort){
        Swal.fire({
            title: "Update confimation",
            text: "Are you sure to update your photos?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update!"
            }).then((result) => {
            if (result.isConfirmed) {
               $scope.updatePhoto();
            }
        });
    }

    $scope.confirmUpdateInfo = function (sort){
        Swal.fire({
            title: "Update confimation",
            text: "Are you sure to update your details?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update!"
            }).then((result) => {
            if (result.isConfirmed) {
               $scope.update();
            }
        });
    }

    $scope.confirBackUserProfile = function (sort){
        Swal.fire({
            title: "Are you sure to go back?",
            text: "Changes will not be saved",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, go back!"
            }).then((result) => {
            if (result.isConfirmed) {
               $scope.backUserProfile();
            }
        });
    }

    $scope.openCamera = function () {
        let video = document.getElementById('video');

        $('#open-camera').hide();
        $('#photo').hide();
        $('.after-photo-taken').hide();
        $('#video').show();
        $('#take-photo').show();

        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then(function(stream) {
            $scope.stream   = stream;
            video.srcObject = stream;
            video.play();
            $scope.streaming = true;
        })
        .catch(function(err) {
            console.log("An error occurred: " + err);
        });
    }

    $scope.takePhoto = function () {
        let video = document.getElementById('video');
        let canvas = document.getElementById('canvas');
        let photo = document.getElementById('photo');

        $('#take-photo').hide();
        $('#photo').show();
        $('.after-photo-taken').show();
        $('#photo').show();
        $('#video').hide();

        if (!$scope.streaming) {
            console.error('Camera not opened yet!');
            return;
        }

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        photo.src = canvas.toDataURL('image/png');
        $scope.stopStream($scope.stream);
    }

    $scope.resetPhoto = function () {
        $('#photo').attr('src', '');
        $scope.openCamera();
    }

    $scope.stopStream = function (stream) {
        if (stream) {
          let tracks = stream.getTracks();

          tracks.forEach((track) => {
            track.stop();
          });
        }
    }

    $scope.sendPhoto = function () {
        const image_src = $('#photo').attr('src');
        const data      = {'src' : image_src};
        $('.loading').show();
        $http({
            method: 'POST',
            url: base_url+'/api/verification/photo/store',
            data: data,
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                if (response.data.success)
                $scope.member.status = Number(response.data.ustatus);
                $scope.backUserProfile();
                $('.loading').hide();
            },

            function (error) {
                alert('Sorry! Something went wrong while sending your verfication photo');
            }
        );
    }

    $scope.showInviterProfile = function (index) {
        $scope.all_images = [];
        $scope.inviter = $scope.inviters[index];

        $scope.inviter_index = index;

        if($scope.inviter.images.length <= 0) {
            let image = {};
            image.sort  = 1;
            image.image = $scope.inviter.gender == 'male' ? base_url + 'assets/default_images/default_male.jpg' : base_url + 'assets/default_images/default_female.webp';
            $scope.image_arr = [image];
        }else{
            $scope.image_arr = $scope.inviter.images;
        }
        $scope.first_name = $scope.inviter.username.split(' ')[0];

        $scope.all_images = [];
        for (let i = 0; i < $scope.image_arr.length; i++) {
            $scope.all_images.push($scope.image_arr[i].image);
        }

        $('#profile-content').scrollTop(0);
        $("#member-content").css("z-index", 5);
        $('#inviter-profile').removeClass('opacity-0');
        $("#inviter-profile").css({
            "z-index": 10,
            "background-color": "rgba(0, 0, 0, 0.5)"
        });
        // $(".carousel-inner").html("");

    }

    $scope.cancelProfile = function () {
        const profile           = document.querySelector('#inviter-profile');
        const memberContent      = document.querySelector('#member-content');
        profile.classList.add('opacity-0');
        profile.style.zIndex = '-10';
        memberContent.style.zIndex = '10';
        profile.style.backgroundColor = "";
    }

    $scope.dateRequestAction = function (id, status) {
        const data = {'id' : id, 'status' : status};
        $('.loading').show();
        $http({
            method: 'POST',
            url: base_url+'api/update_date_request.php',
            data: data,
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                if(response.data.status == '200') {
                    $('.loading').hide();
                }
                console.log(response);
            }
        );
    }

    $scope.foundPartner = function (status) {
        const data      = {'status' : status};
        $('.loading').show();
        $http({
            method: 'POST',
            url: base_url+'api/update_love_status.php',
            data: data,
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                $scope.member.love_status = response.data.love_status;
                $('.loading').hide();
            }
        );
    }

});
