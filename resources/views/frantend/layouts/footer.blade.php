<!-- Footer-->
<?php
$setting = App\Models\Setting::get()->first();
?>
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">{{$setting->website}}</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="{{$setting->link_1}}"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{$setting->link_2}}"><i class="fa fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{$setting->link_3}}"><i class="fa fa-linkedin"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>