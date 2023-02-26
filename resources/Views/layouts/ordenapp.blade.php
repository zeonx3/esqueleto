

<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, xtreme admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template">
    <meta name="robots" content="noindex,nofollow">
    
    <title>Appnet Store</title>

    {{-- links --}}
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- This page CSS -->
    <link href="../../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

    <link href="../../assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="../../assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.css" rel="stylesheet">
    <link href="../../dist/css/personalizacion.css" rel="stylesheet">
    <link href="../../dist/css/jquery-ui.min.css" rel="stylesheet">
    <link href="../../dist/css/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="../../dist/css/jquery-ui.theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/extra-libs/prism/prism.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
</head> 


<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>  
<!-- apps -->
<script src="../../dist/js/app.min.js"></script>
<script src="../../dist/js/app.init.mini-sidebar.js"></script>
<script src="../../dist/js/app-style-switcher.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/feather.min.js"></script>
<!--This page JavaScript -->
<script src="../../dist/js/custom.min.js"></script>
<script src="../../assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="../../assets/libs/jquery-validation/dist/jquery.validate.js"></script>
<script src="../../assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="../../assets/libs/block-ui/jquery.blockUI.js"></script>
<script src="../../assets/extra-libs/block-ui/block-ui.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
<script src="../../assets/extra-libs/jquery.repeater/repeater-init.js"></script>
<script src="../../assets/extra-libs/jquery.repeater/dff.js"></script>
<script src="../../assets/extra-libs/prism/prism.js"></script>

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

$(function(){

    $('.select2').select2({ allowclear: true, dropdownAutoWidth: true, width: '100%', minimumResultsForSearch: -1});
    $('.select2-tags').select2({
        tags: true
    });
    $('.sj_select2').select2({
    width: '100%'
    });
    $('.select2-with-bg').each(function(i, obj) {
        var variation = "",
            textVariation = "",
            textColor = "";
        var color = $(this).data('bgcolor');
        variation = $(this).data('bgcolor-variation');
        textVariation = $(this).data('text-variation');
        textColor = $(this).data('text-color');
        if (textVariation !== "") {
            textVariation = " " + textVariation;
        }
        if (variation !== "") {
            variation = " bg-" + variation;
        }
        var className = "bg-" + color + variation + " " + textColor + textVariation + " border-" + color;

        $(this).select2({
            containerCssClass: className
        });
    });

})

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

<script src="../../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../js/select2.js"></script>
<script src="../../assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<body>
    <style>
        .select2-selection__clear{
			display: none;
		}
        .mcenter {
            transform: translateY(-60%);
        }
    </style>
    
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#2962FF" stroke-width="2"></path>
          <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#2962FF" stroke-width="2"></path>
          <path id="teabag" fill="#2962FF" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
          <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#2962FF"></path>
          <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#2962FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
    <div id="main-wrapper">

        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer text-center">
                   Todos los derechos reservados. Diseñado y Desarrollado por <a href="https://appnet.cl" class="text-orange">Appnet Holding Group</a>.
            </footer>
        </div>
    </div>
</body>

</html>