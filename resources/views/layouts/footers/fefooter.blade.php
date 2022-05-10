@php($setting = getSiteSetting())
<footer class="container-fluid ">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0">&copy; Copyright <script>document.write(new Date().getFullYear())</script>
                    <strong class="text-dark">{{$setting['site_name']}}</strong>. All Rights Reserved<br>
                    <small class="mt-0 mb-0 d-none">Made with <i class="fas fa-heart text-danger"></i> by <a
                                class="text-primary" target="_blank" href="https://askbootstrap.com/">Ask Bootstrap</a>
                    </small>
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 text-right ">
                <div class="app d-none">
                    <a href="#"><img alt="" src="{{ asset('frontend/img/google.png') }}" /></a>
                    <a href="#"><img alt="" src="{{ asset('frontend/img//apple.png') }}" /></a>
                </div>
            </div>
        </div>
    </div>
</footer>