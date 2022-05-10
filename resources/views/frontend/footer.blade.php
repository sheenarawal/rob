
@php($setting = getSiteSetting())
<footer class="sticky-footer bottom-0">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0">&copy; Copyright <script>document.write(new Date().getFullYear())</script>
                    <strong class="text-dark">{{$setting['site_name']}}</strong>. All Rights Reserved<br>
                </p>
            </div>
            <div class="col-lg-6 col-sm-6 text-right ">
                <p class="mb-0"><a href="{{route('term_condition')}}">Terms of Service</a> and
                    <a href="{{route('privacy_policies')}}">Privacy Policies</a>.
                </p>
            </div>
        </div>
    </div>
</footer>