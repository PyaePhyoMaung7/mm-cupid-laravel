<div class="offcanvas offcanvas-start position-absolute left-0" style="width: 650px;" data-bs-backdrop="false" tabindex="-1" id="offcanvasPointPurchase" aria-labelledby="offcanvasPointPurchase">
    <div class="offcanvas-header position-sticky bg-white py-2 top-0 z-3 px-4 d-flex justify-content-between align-items-center fw-bold" style="font-size: 17px;">
        <div type="button" ng-click="backSearchOffcanvas()" class="fs-4 float-left" data-bs-dismiss="offcanvas" aria-label="Close" aria-label="Back"><i class="fa fa-chevron-left"></i></div>
    </div>
    <div class="offcanvas-body py-0">
        <div id="point-offcanvas">
            <h4 class="text-center mb-4">{{ $setting->company_name }} Point Packages</h4>

            <div class="text-center border rounded-4 shadow-sm py-4 mb-3">
                <i class="fa fa-usd me-1 shadow text-dark text-center pt-2 rounded-circle bg-white" style="font-size: 65px; width:80px; height:80px; padding: 2px 5px;"></i>
                <h5 class="mt-3">1000 points</h5>
                <h3 class="mt-4 fw-bold">10,000 MMK</h3>
                <span class="mt-2">-</span>
            </div>

            <div class="text-center border rounded-4 shadow-sm py-4 mb-3">
                <i class="fa fa-usd me-1 shadow text-dark text-center pt-2 rounded-circle bg-white" style="font-size: 65px; width:80px; height:80px; padding: 2px 5px;"></i>
                <h5 class="mt-3">3000 points</h5>
                <h3 class="mt-4 fw-bold">30,000 MMK</h3>
                <span class="mt-2 fw-bold">+ <span class="text-danger">extra</span> 500 points (total 3500 points)</span>
            </div>

            <div class="text-center border rounded-4 shadow-sm py-4 mb-5">
                <i class="fa fa-usd me-1 shadow text-dark text-center pt-2 rounded-circle bg-white" style="font-size: 65px; width:80px; height:80px; padding: 2px 5px;"></i>
                <h5 class="mt-3">5000 points</h5>
                <h3 class="mt-4 fw-bold">50,000 MMK</h3>
                <span class="mt-2 fw-bold">+ <span class="text-danger">extra</span> 1500 points (total 6500 points)</span>
            </div>

            <h4 class="text-center mt-2 mb-4">Transfer money to these accounts</h4>

            <div class="p-3 mb-2 text-center">
                <div class="shadow mx-auto" style="width:100px; height:100px; overflow:hidden;">
                    <img class="w-100 h-100" style="border-radius:10px;" src="{{ asset('storage/images/kpay_logo.png') }}" alt="">
                </div>
                <div class="mt-3">
                    <h5>09699365302</h5>
                    <h6>Pyae Phyo Maung</h6>
                </div>
            </div>

            <div class="p-3 mb-5 text-center">
                <div class="shadow mx-auto" style="width:100px; height:100px; overflow:hidden;">
                    <img class="w-100 h-100" style="border-radius:10px;" src="{{ asset('storage/images/wave_logo.jpg') }}" alt="">
                </div>
                <div class="mt-3">
                    <h5>09699365302</h5>
                    <h6>Pyae Phyo Maung</h6>
                </div>
            </div>


            <h4 class="text-center mt-4 mb-4">To Purchase Point</h4>

            <div class="p-3">
                <h5 class="text-center mb-4">Step (1)</h5>
                <div class="mb-5 text-center">
                    <div class="shadow mx-auto mt-2" style="width:400px; overflow:hidden;">
                        <img class="w-100 h-100" style="border-radius:10px;" src="{{ asset('storage/images/kpay_wave.jpg') }}" alt="">
                    </div>
                    <h6 class="mt-3">
                        Please transfer the amount of money of your chosen package to the above mentioned accounts.
                    </h6>
                </div>

                <h5 class="text-center my-4">Step (2)</h5>
                <h6 class="mt-2 mb-5 text-center">
                        Please take a screenshot of your transaction.
                </h6>

                <h5 class="text-center my-4">Step (3)</h5>
                <h6 class="mt-2 mb-2 text-center">
                        <div>Attach the screenshot below.</div>
                        <div>Click "submit".</div>
                        <div>Admin will review and recharge point for you.</div>
                </h6>
            </div>

            <div class="p-3">
                <div class="preview-container bg-body-secondary position-relative overflow-hidden rounded-2 d-flex justify-content-center align-items-center" ng-click="browseFile()" style="height: 60vh;">
                    <div id="preview7" class="d-none w-100 h-100"></div>
                    <label for="" onclick="browseImage('7')" class="btn btn-dark p-2 rounded-3 hide position-absolute change-photo change-photo7" style="opacity: 0.6" >Change</label>
                    <i class="fa fa-upload fs-4" style="cursor: pointer" id="upload-icon-7" onclick="browseImage('7')"></i>
                </div>
                <input type="file" name="upload7" id="upload7" onchange="previewImage('7')" class="d-none">
            </div>


            <div class="p-3 mb-2">
                <button class="btn btn-dark w-100 fs-5 rounded-pill" id="send-screenshot-btn" ng-click="sendTransactionScreenshot()"><i class="fa fa-photo"></i> Submit</button>
            </div>
        </div>
    </div>
</div>

<script>

</script>
