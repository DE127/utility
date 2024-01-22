<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@lang('By DE127')</title>
	<link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/global/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/global/css/installer.css') }}">
	<link rel="shortcut icon" href="{{ getImage('assets/images/logoIcon/favicon.png') }}" type="image/x-icon">
</head>
<body>
	<header class="py-3 border-bottom border-primary bg--dark">
		<div class="container">
			<div class="d-flex align-items-center justify-content-between header gap-3">
				<img class="logo" src="{{ getImage('assets/images/logoIcon/logo.png') }}" alt="ViserLab">
				<h3 class="title">@lang('Easy Activation')</h3>
			</div>
		</div>
	</header>
	<div class="installation-section padding-bottom padding-top">
		<div class="container">
			<div class="installation-wrapper">
				<div class="install-content-area">
					<div class="install-item">
						<h3 class="title text-center">{{ systemDetails()['name'] }} @lang('License Activation')</h3>
                        <div class="box-item">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="alert-area alert alert-danger d-none">
                                        <h5 class="resp-msg"></h5>
                                        <p class="my-3">@lang('You can ask for support by creating a support ticket.')</p>
                                        <a href="{{ De127\Utility\VugiChugi::splnk() }}" class="btn btn-outline-light btn-sm" target="_blank">@lang('create  ticket')</a>
                                    </div>

                                </div>
                                <div class="col-lg-5">
                                    <div class="alert alert-primary" role="alert">
                                        <p class="fs-17">@lang('Application'): {{ systemDetails()['name'] }} - v{{ systemDetails()['version'] }}</p>
                                        <p class="fs-17">@lang('Username'): <span class="envato_username"></span></p>
                                        <p class="fs-17">@lang('Code'): <span class="purchase_code"> </span></p>
                                        <p class="fs-17">@lang('Your Email'): <span class="email"></span></p>
                                        <p class="fs-17 mb-0 word-break-all">@lang('Activation URL'): {{ De127\Utility\Helpmate::appUrl() }}</p>
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        <p class="fs-17 mb-0">@lang('We never collect any sensitive or confidential data.')</p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <form class="verForm">
                                        <div class="information-form-group">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <label for="purchase_code" class="mb-1">@lang('Enter Code') <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <input type="text" name="purchase_code" id="purchase_code" required>
                                        </div>
                                        <div class="information-form-group">
                                            <label for="username" class="mb-1">@lang('Enter Username') <span class="text-danger">*</span></label>
                                            <input type="text" name="envato_username" id="username" required>
                                        </div>
                                        <div class="information-form-group">
                                            <label for="email" class="mb-1">@lang('Enter Your Email') <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" required>
                                        </div>

                                        <div class="information-form-group d-flex">
                                            <input type="checkbox" id="agree" class="w-auto h-auto mt-1" required>
                                            <label for="agree" class="agree-label">@lang('I accept agree with Privacy Policy , Terms of Service')</label>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="theme-button choto sbmBtn">@lang('Activate Now')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<footer class="py-3 text-center bg--dark border-top border-primary">
		<div class="container">
			<p class="m-0 font-weight-bold">&copy;<?php echo Date('Y') ?> - @lang('All Right Reserved by') <a href="https://notstudio.co/">@lang('notStudio')</a></p>
		</div>
	</footer>
	<script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/global/js/jquery-3.6.0.min.js') }}"></script>
    @include('partials.notify')
    <script>
        (function($){
            "use strict"

            $('.verForm').submit(function (e) {
                e.preventDefault();
                $('.alert-area').addClass('d-none');
                $('.sbmBtn').text('Processing...');
                var url = '{{ route(De127\Utility\VugiChugi::acRouterSbm()) }}';
                var data = {
                    "purchase_code":$(this).find('[name=purchase_code]').val(),
                    "email":$(this).find('[name=email]').val(),
                    "envato_username":$(this).find('[name=envato_username]').val()
                };

                $.post(url, data,function (response) {
                    if (response.type == 'error') {
                        $('.sbmBtn').text('Submit');
                        $('.verForm').trigger("reset");
                        $('.alert-area').removeClass('d-none');
                        $('.resp-msg').text(response.message);
                    }else{
                        location.reload();
                    }
                });

            });

            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip({
                    animated: 'fade',
                    trigger: 'click'
                })
            })

            $('[name=email]').on('input', function () {
                $('.email').text($(this).val());
            });

            $('[name=envato_username]').on('input', function () {
                $('.envato_username').text($(this).val());
            });

            $('[name=purchase_code]').on('input', function () {
                $('.purchase_code').text($(this).val());
            });

        })(jQuery);
    </script>
</body>

</html>
