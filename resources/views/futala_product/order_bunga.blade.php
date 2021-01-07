@php
$userLogin = session('userLogin');
if($userLogin === null){
$sessionUser = 'no';
}else{
$sessionUser = 'yes';
}
@endphp
<div class="row" id="divOrder">
    <hr />
    <div class="col">
        <div class="coupon-area">
            <!-- coupon-accordion start -->
            <div class="coupon-accordion">
                @if($sessionUser == 'yes')
                <h3>You login with account <b>{{ $userLogin }}</b>. If this account not you,
                    <a href="{{ ENV('JSVOID') }}" class="coupon" @click="silentLogout">Click here to logout</a>
                </h3>
                @else
                <h3>You need login to continue order? <span class="coupon" id="showlogin" onclick="showLogin()">Click here to login</span></h3>
                <div class="coupon-content" id="checkout-login">
                    <div id="divLoading" style="text-align:center;display:none;">
                        <lottie-player src="{{ env('LOTTIE_LOADING_LOGIN') }}" mode="bounce" background="transparent" speed="1" style="width: 300px; height: 300px;margin:auto;" loop autoplay></lottie-player>
                        <h5>Login to ebunga ... </h5>
                    </div>
                    <div class="coupon-info" id="divFormLogin">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>

                        <p class="coupon-input form-row-first">
                            <label>Username or email <span class="required">*</span></label>
                            <input type="text" name="email" id="txtUsername">
                        </p>
                        <p class="coupon-input form-row-last">
                            <label>password <span class="required">*</span></label>
                            <input type="password" name="password" id="txtPassword">
                        </p>
                        <div class="clear"></div>
                        {!! NoCaptcha::display(['data-theme' => 'white', 'data-callback' => 'recaptcha_callback']) !!}
                        <p style="margin-top:20px;">
                            <a class="button-login btn" name="login" id="btnLoginSilent" @click="loginSilentAtc">Login</a>
                            <label class="remember"><input type="checkbox" value="1"><span>Remember</span></label>
                        </p>
                        <p class="lost-password">
                            <a href="#">Lost your password?</a>
                        </p>

                    </div>
                </div>
                @endif

            </div>
            <!-- coupon-accordion end -->
            <!-- coupon-accordion start -->

            <div class="row mt-4">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="wizard-steps">
                        <div class="wizard-step wizard-step-active disabled">
                            <div class="wizard-step-icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                            <div class="wizard-step-label">
                                Order Placed
                            </div>
                        </div>
                        <div class="wizard-step wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-money-check"></i>
                            </div>
                            <div class="wizard-step-label">
                                Details Order
                            </div>
                        </div>
                        <div class="wizard-step wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="wizard-step-label">
                                Payment
                            </div>
                        </div>
                        <div class="wizard-step wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                                Order Complete
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="checkout-details-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        <div class="billing-details-wrap" id="divOrderDetails">
                            <h4 class="shoping-checkboxt-title">Order Details</h4>
                            <div class="form-group">
                                <label>Sender Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Receiver Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Receiver Email</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Receiver Phone Number</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Caption on greeting card</label>
                                <textarea class="form-control" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Delivery Date</label>
                                <input type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>

                        <div class="billing-details-wrap" id="divShipmentAddress" style="display: none;">
                            <h4 class="shoping-checkboxt-title">Shipment Address</h4>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" disabled value="{{ $dataAlamat['namaProvinsi'] }}">
                            </div>
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <input type="text" class="form-control" disabled value="{{ $dataAlamat['namaKabupaten'] }}">
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control">
                                @foreach($dataAlamat['dataKecamatan'] as $kecamatan)
                                    <option>{{ $kecamatan -> nama }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <a href="#!" class="btn btn-primary btn-icon icon-left" onclick="nextStep()" style="color: #ecf0f1;border-radius:10px;border:#ecf0f1 solid 1px;">
                                <i class="ion-arrow-right-b"></i> Next (Delivery Address)
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="billing-details-wrap">
                            <h4 class="shoping-checkboxt-title">Order Preview</h4>
                        </div>
                    </div>
                </div>
            </div>


            @if($sessionUser == 'yes')
            <div class="coupon-accordion" style="margin-top:20px;">
                <h3>Have a coupon? <span class="coupon" id="showcoupon">Click here to enter your code</span></h3>
                <div class="coupon-content" id="checkout-coupon">
                    <div class="coupon-info">
                        <form action="#">
                            <p class="checkout-coupon">
                                <input type="text" placeholder="Coupon code">
                                <button type="submit" class="btn button-apply-coupon" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- coupon-accordion end -->
            @else

            @endif

        </div>
    </div>
</div>