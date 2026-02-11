<!doctype html>
<!-- Template Name: DashTail HTML – Tailwind CSS & Alpine.js Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="en">


<!-- Mirrored from dashtail-alpine.vercel.app/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 17:24:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="DashTail HTML – Tailwind, Alpine Admin Dashboard Template" />
  <meta name="keywords"
    content="admin, admin dashboard, admin dashboard template, admin themes, analytics dashboard, dashboard, e-commerce dashboard, alpine js, html, responsive dashboard, css3, Tailwind CSS, html dashboard, ui component library, ui kit" />
  <meta name="author" content="Codeshaper" />

  <title>Dashtail HTML</title>

  <!-- Favicon CSS -->
  <link rel="icon" type="image/png" href="../../assets/app/images/favicon.ico" />

  <!-- Fonts CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet" />

  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>

  <!-- Include App CSS -->
  <link rel="stylesheet" href="../../assets/app/css/app.css" />

  <!-- Alpine JS -->
  <script src="../../assets/app/js/alpinejs-twmerge.js"></script>
  <script defer src="../../assets/app/js/alpinejs-collapse.js"></script>
  <script defer src="../../assets/app/js/alpinejs-focus.js"></script>
  <script defer src="../../assets/app/js/alpine.js"></script>

  <!-- MapBox -->
  <link href="../../assets/app/css/mapbox-gl.css" rel="stylesheet" />
  <script defer src="../../assets/app/js/mapbox-gl.js"></script>

  <!-- Charts -->
  <script src="../../assets/app/js/apexchart.js"></script>
  <script src="../../assets/app/js/chart.js"></script>
  <script src="../../assets/app/js/chartjs.js"></script>
  <script src="../../assets/app/js/fullcalendar.js"></script>
  <script src="../../assets/app/js/calendar.js"></script>

  <!-- Leaflet -->
  <link rel="stylesheet" href="../../assets/app/css/leaflet.css" />
  <link href="../../assets/app/css/quill.snow.css" rel="stylesheet" />
  <script src="../../assets/app/js/leaflet.js"></script>

  <!-- Quill JS -->
  <script src="../../assets/app/js/quill.js"></script>

  <!-- Vector Map -->
  <link rel="stylesheet" href="../../assets/app/css/jsvectormap.min.css" />
  <script src="../../assets/app/js/jsvectormap.js"></script>
  <script src="../../assets/app/js/jsvectormap-world.js"></script>

  <!-- Main Js -->
  <script src="../../assets/app/js/app.js"></script>

</head>

<body class=" font-inter  dash-tail-app " x-data :dir="$store.app.direction" x-bind:class="{
    'dark': $store.app.isDark, 
    ['theme-' + $store.app.theme]: true 
  }">
  <!-- [if IE]> <p> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->

  <!--  START: Loader -->
  <div x-show="$store.app.loading">
    <div class="fixed top-0 start-0 w-full min-h-svh flex justify-center items-center">
      <div role="status">
        <svg aria-hidden="true" class="w-8 h-8 text-default-200 animate-spin dark:text-default-600 fill-primary"
          viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
          <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
  <!--  END: Loader-->

  <?php include './includes/header_enca.php'; ?>
  <!--  END: Floating Header -->
  <!-- *************************
          END: Header Wrapper
      *************************** -->



  <?php include './includes/navbar_enca.php'; ?>
  <!-- *************************
          END: Mobile Menu
      *************************** -->

  <!-- *************************
              START: Main
      *************************** -->
  <? echo $content ?>
  <!-- *************************
              END: Main
      *************************** -->

  <!-- *************************
          START: Footer Wrapper
      *************************** -->
  <?php include './includes/footer_enca.php'; ?>
  <!--  END: Customizer -->
</body>

<!-- Mirrored from dashtail-alpine.vercel.app/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 17:24:48 GMT -->

</html>