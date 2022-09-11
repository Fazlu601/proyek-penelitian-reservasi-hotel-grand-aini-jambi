@include('layout.nav.nav')

    <section>
          <div id="carouselExampleCaptions" class="carousel slide carousel-dark" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item carsl active">
                <img src="img/view.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h1 class="text-lg text-carousel">WELCOME TO <br> GRAND AINI HOTEL</h1>
                  <div class="row d-flex justify-content-center mt-5">
                    <div class="col-lg-3">
                      <a href="hotel" class="nav-aini">
                        <div  class="card navcar {{ Request::is('hotel') ? 'border border-5 rounded border-warning' : '' }} d-flex shadow p-3 mb-5 bg-body rounded" style="height:120px">
                          <div class="card-body">
                            <i class="fas fa-hotel text-center" style="font-size: 40px; color:#0c8a34;"></i>
                            <h5 class="card-title text-center fs-5">The Hotel</h5>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="room" class="nav-aini">
                        <div  class="card navcar d-flex shadow p-3 mb-5 bg-body rounded" style="height:120px">
                          <div class="card-body">
                            <i class="fas fa-bed text-center"  style="font-size: 40px; color:#0c8a34;"></i>
                            <h5 class="card-title text-center fs-5">The Room</h5>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item carsl">
                <img src="img/parkir2.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h1 class="text-lg text-carousel">WELCOME TO <br> GRAND AINI HOTEL</h1>
                  <div class="row d-flex justify-content-center mt-5">
                    <div class="col-lg-3">
                      <a href="/hotel" class="nav-aini">
                        <div class="card navcar {{ Request::is('hotel') ? 'border border-5 border-warning rounded' : '' }} d-flex shadow p-3 mb-5 bg-body rounded" style="height:120px">
                          <div class="card-body">
                            <i class="fas fa-hotel text-center" style="font-size: 40px; color:#0c8a34;"></i>
                            <h5 class="card-title text-center fs-5">The Hotel</h5>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-3">
                      <a href="room" class="nav-aini">
                        <div class="card navcar d-flex shadow p-3 mb-5 bg-body rounded" style="height:120px">
                          <div class="card-body">
                            <i class="fas fa-bed text-center"  style="font-size: 40px; color:#0c8a34;"></i>
                            <h5 class="card-title text-center fs-5">The Room</h5>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>

