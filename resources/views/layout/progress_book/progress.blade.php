<div class="container mt-5">
    <div class="row p-0">
        <div class="col-md-10 offset-md-1">
            <div class="progress" style="height: 25px">
                <div class="progress-bar bg-success fw-bold" role="progressbar" {{ Request::is('order') ? style="width: 50%" : style="width: 100%" }} 
                {{ Request::is('order') ? aria-valuenow="50" : aria-valuenow="100" }}
                aria-valuemin="0" aria-valuemax="100">
                {{ Request::is('order') ? '50%' : '100%' }}
            </div>
              </div>
        </div>
    </div>
</div>


