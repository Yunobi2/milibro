<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
            <!-- Bootstrap Icons CSS -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet"
        />
        <!-- Font Awesome CSS -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        rel="stylesheet"
        />
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        </head>

    <body>

        <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form action=" {{route('register')}} " method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div>
                    @endif
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                      <p class="lead fw-normal mb-0 me-3">Registrarse con</p>
                      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                        <i class="bi bi-google"></i>
                      </button>
          
                    </div>
          
                    <div class="divider d-flex align-items-center my-4">
                      <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>
          
                    <!-- Email input -->

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="name" id="form3Example3" class="form-control form-control-lg"
                          placeholder="Nombre" />
                      </div>    

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Correo" />
                    </div>
          
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                      <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Contraseña" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" name="password_confirmation" id="form3Example4" class="form-control form-control-lg"
                          placeholder="Confirmar contraseña" />
                    </div>

                <!--<div class="d-flex justify-content-between align-items-center">
                      Checkbox
                      <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                          Remember me
                        </label>
                      </div>
                      <a href="#!" class="text-body">Forgot password?</a>
                    </div> -->
          
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrarse</button>
                    </div>
                    
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <p>Regresar al login</p>
                      <a  href="{{route('login')}}" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Regresar</a>
                    </div>

                  </form>
                </div>
              </div>
            </div>
              <!-- Right -->
            </div>
          </section>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
