<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, xtreme admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Xtreme is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <title>XXXX | Inicio de sesión</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.css" rel="stylesheet">
    <link href="../../dist/css/personalizacion.css" rel="stylesheet">
    <link href="../../dist/css/jquery-ui.min.css" rel="stylesheet">
    <link href="../../dist/css/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="../../dist/css/jquery-ui.theme.min.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link href="../../dist/css/login.css" rel="stylesheet">

</head>

<script src="../../assets/libs/block-ui/jquery.blockUI.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>  
<script>

    $.blockUI.defaults.css = {
        padding: '10px',
        margin: '10px',
        width: '30%',
        top: '40%',
        left: '35%',
        textAlign: 'center',
        cursor: 'wait',
        transform: 'rotate(360deg)'

    };
</script>
<script>

    class messageSwal {

    constructor () 
    {
        this.message = [];
        this.type = '';
        this.title = '';
    }

    set setTitle(title)
    {
        this.title = title;
    }

    set setMessage(message)
    {
        this.message.push(message);
    }

    set setType(type)
    {
        this.type = type;
    }

    messageExist() 
    {
        return this.message.length > 0;
    }

    mostrarMessage(target, thenSWAL = function(){}) 
    {
        var div = $( '<div/>' );
        
        var title = this.title;
        var type = this.type;

        this.message.forEach( (item) => {div.append($( '<div/>' ).text(item))});

        $(target).ready(function(){
            swal.fire(title, div.html(), type).then(() => { return thenSWAL() })
        });

        this.limpiarMessage();
    }

    limpiarMessage () 
    {
        this.message = [];
    }
    }
</script>

<body>
    <div class="main-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- -------------------------------------------------------------- -->
        <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#fc671a" stroke-width="2"></path>
          <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#fc671a" stroke-width="2"></path>
          <path id="teabag" fill="#fc671a" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
          <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#fc671a"></path>
          <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#fc671a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Login box.scss -->
        <!-- -------------------------------------------------------------- -->
        <div class="row auth-wrapper gx-0">
            <div class="col-lg-4 col-xl-3 bg-info auth-box-2 on-sidebar">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-7 col-lg-12 col-xl-9">
                            <div>
                                <span class="db"><img style="width: 200px;" class="ico-logo" src="https://img.freepik.com/vector-premium/logotipo-cubo-generico_9569-169.jpg?w=826" alt="logo" /></span>
                                <span class="db"><img style="width: 100px;" src="https://blog.hubspot.es/hubfs/media/tipografiasparalogossteady.jpeg" alt="logo" /></span>
                            </div>
                            <h2 class="text-white mt-4 fw-light">Texto 1 <span class="font-medium">Texto 2</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9 d-flex align-items-center justify-content-center">
                <div class="row justify-content-center w-100 mt-4 mt-lg-0">
                    <div class="col-lg-6 col-xl-3 col-md-7">
                      
                        <div class="card" id="loginform">
                           @include ('auth.loginpost')
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Login box.scss -->
        <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Required js -->
    <!-- -------------------------------------------------------------- -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(".preloader").fadeOut();
        // ---------------------------
        // Login and Recover Password 
        // ---------------------------
        $('#to-recover').on("click", function() {
            $("#loginform").hide();
            $("#recoverform").fadeIn();
        });

        $('#to-login').on("click", function() {
            $("#loginform").fadeIn();
            $("#recoverform").hide();
        });

        $('#to-register').on("click", function() {
            $("#loginform").hide();
            $("#registerform").fadeIn();
        });

        $('#to-login2').on("click", function() {
            $("#loginform").fadeIn();
            $("#registerform").hide();
        });


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
        })()
    </script>
</body>

</html>