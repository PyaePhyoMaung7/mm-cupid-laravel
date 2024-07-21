var app = angular.module("myApp", []);

app.controller('myCtrl', function($scope, $http){
    $scope.login_info       = {};
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

    $scope.init = function (id) {
        $scope.getMemberInfo(id);
        $scope.apiMe();
    }

    $scope.apiMe = function () {
        $('.loading').show();
        $http({
            method: 'GET',
            url: base_url+'/api/member',
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                if(response.status = 200) {
                    $scope.login_info = response.data.data;
                } else {
                    alert('Something went wrong while retrieving login user info');
                }
            }
        );
    }

    $scope.getMemberInfo = function (id) {
        $('.loading').show();
        $http({
            method: 'POST',
            url: base_url + '/api/member',
            data: {'id' : id},
            headers: {
              'Content-Type': 'application/json'
            }
        }).then(
            function (response) {
                console.log(response);
                if(response.status == "200") {
                    $scope.member       = response.data.data;
                    console.log($scope.member);
                    $scope.inviters     = response.data.data.received_date_requests;
                    $scope.bindImages($scope.member.images);
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

    $scope.showMemberProfile = function () {
        $scope.all_images = [];
        $scope.checkDateRequests($scope.member);

        if($scope.member.images.length <= 0) {
            let image = {};
            image.sort  = 1;
            image.image = $scope.member.gender == 'male' ? base_url + 'assets/default_images/default_male.jpg' : base_url + 'assets/default_images/default_female.webp';
            $scope.image_arr = [image];
        }else{
            $scope.image_arr = $scope.member.images;
        }
        $scope.first_name = $scope.member.username.split(' ')[0];

        $scope.all_images = [];
        for (let i = 0; i < $scope.image_arr.length; i++) {
            $scope.all_images.push($scope.image_arr[i].image);
        }
        console.log($scope.all_images);
        $('#profile-content').scrollTop(0);
        // $("#image-content").css("z-index", 5);
        $('#member-profile').removeClass('opacity-0');
        $("#member-profile").css({
            "z-index": 10,
            "background-color": "rgba(0, 0, 0, 0.5)"
        });
        $(".carousel-inner").html("");

    }

    $scope.cancelProfile = function () {
        const profile           = document.querySelector('#member-profile');
        const imageContent      = document.querySelector('#image-content');
        profile.classList.add('opacity-0');
        profile.style.zIndex = '-10';
        // imageContent.style.zIndex = '10';
        profile.style.backgroundColor = "";
    }

    $scope.stopImageView = function () {
        const body              = document.querySelector('body');
        const getCarousel       = document.querySelector(".carousel-inner");
        const carouselWrapper   = document.querySelector("#carousel-wrapper");

        body.classList.remove('overflow-hidden');
        body.classList.add('overflow-x-hidden');
        carouselWrapper.style.zIndex = -20;
        getCarousel.innerHTML = '';
        carouselWrapper.classList.add('opacity-0');
    }

    $scope.showCarousel = function (index, src) {

        const getCarousel       = document.querySelector(".carousel-inner");
        const currentPage       = document.querySelector("#current-page");
        const carouselWrapper   = document.querySelector("#carousel-wrapper");
        const profileImages     = document.querySelectorAll(".profile-image");
        const body              = document.querySelector('body');

        $scope.member_image_index = index;
        if($scope.member_image_index <= 0 ){
            $("#carousel-prev-btn").addClass('d-none');
            $("#carousel-prev-btn").prop('disabled', true);
        }else{
            $("#carousel-prev-btn").removeClass('d-none');
            $("#carousel-prev-btn").prop('disabled', false);
        }

        if($scope.member_image_index >= $scope.image_arr.length - 1 ){
            $("#carousel-next-btn").addClass('d-none');
            $("#carousel-next-btn").prop('disabled', true);
        }else{
            $("#carousel-next-btn").removeClass('d-none');
            $("#carousel-next-btn").prop('disabled', false);
        }

        carouselWrapper.style.zIndex = '20';
        carouselWrapper.classList.remove('opacity-0');
        for (let x = 0; x < profileImages.length; x++) {
            let img = document.createElement('img');
            let div = document.createElement('div');
            if (x == 0) {
                div.className = "carousel-item active";
                img.src = src;
                console.log(src);
                currentPage.innerHTML = $scope.member_image_index +1 + ' of '+ $scope.all_images.length;
            } else {
                div.className = "carousel-item";
                let indexOf = index;
                indexOf += x;
                if (indexOf >= $scope.all_images.length) {
                    indexOf = indexOf - $scope.all_images.length;
                };

                img.src = $scope.all_images[indexOf];
                console.log($scope.all_images[indexOf]);
            }
            img.className = "d-block vh-100 object-fit-cover w-100";
            img.alt = "profile-photo";
            img.style.width = "10%";
            div.appendChild(img);
            getCarousel.appendChild(div);
            body.classList.remove('overflow-x-hidden');
            body.classList.add('overflow-hidden');
        }
    }

    $scope.displayCurrentPage = (btn) => {
        const currentPage       = document.querySelector("#current-page");

        if(btn == 'next') {
            if($scope.member_image_index + 1 < $scope.image_arr.length){
                $scope.member_image_index++;
                const src = $scope.all_images[$scope.member_image_index];
                $scope.showCarousel($scope.member_image_index, src);
            }
        }else{
            if($scope.member_image_index - 1 >= 0){
                $scope.member_image_index--;
                const src = $scope.all_images[$scope.member_image_index];
                $scope.showCarousel($scope.member_image_index, src);
            }
        }

        currentPage.innerHTML = $scope.member_image_index+1 + ' of '+ $scope.image_arr.length;
    }


    $scope.checkDateRequests = function (member) {
        $scope.available_to_request_date    = true;
        let sent_date_requests              = member.sent_date_requests;
        let received_date_requests          = member.received_date_requests;
        for (let i = 0; i < sent_date_requests.length; i++) {
            if (sent_date_requests[i].accept_id == $scope.login_info.id) {
                $scope.available_to_request_date = false;
                return ;
            }
        }

        for (let i = 0; i < received_date_requests.length; i++) {
            if (received_date_requests[i].invite_id == $scope.login_info.id) {
                $scope.available_to_request_date = false;
                return ;
            }
        }
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
});
