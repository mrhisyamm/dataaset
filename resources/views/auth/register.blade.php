

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<title>
    Welcome Back To Sistem Manajemen Aset
  </title>


<link rel="canonical" href="https://www.creative-tim.com/product/soft-ui-dashboard" />

<meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Soft UI Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, free dashboard, free admin dashboard, free bootstrap 5 admin dashboard">
<meta name="description" content="Soft UI Dashboard is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">

<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@creativetim">
<meta name="twitter:title" content="Soft UI Dashboard by Creative Tim">
<meta name="twitter:description" content="Soft UI Dashboard is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
<meta name="twitter:creator" content="@creativetim">
<meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/450/original/opt_sd_free_thumbnail.png">

<meta property="fb:app_id" content="655968634437471">
<meta property="og:title" content="Soft UI Dashboard by Creative Tim" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://demos.creative-tim.com/soft-ui-dashboard/examples/dashboard.html" />
<meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/450/original/opt_sd_free_thumbnail.png" />
<meta property="og:description" content="Soft UI Dashboard is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you." />
<meta property="og:site_name" content="Creative Tim" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

<link id="pagestyle" href="../assets/css/soft-ui-dashboard.min.css?v=1.0.6" rel="stylesheet" />

<style>
    .async-hide {
      opacity: 0 !important
    }
  </style>
<script>
    (function(a, s, y, n, c, h, i, d, e) {
      s.className += ' ' + y;
      h.start = 1 * new Date;
      h.end = i = function() {
        s.className = s.className.replace(RegExp(' ?' + y), '')
      };
      (a[n] = a[n] || []).hide = h;
      setTimeout(function() {
        i();
        h.end = null
      }, c);
      h.timeout = c;
    })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
      'GTM-K9BGS8K': true
    });
  </script>

<script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-46172202-22', 'auto', {
      allowLinker: true
    });
    ga('set', 'anonymizeIp', true);
    ga('require', 'GTM-K9BGS8K');
    ga('require', 'displayfeatures');
    ga('require', 'linker');
    ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
  </script>


<script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>

</head>
<body class="">


<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>


<main class="main-content  mt-0">
<section>
<div class="page-header min-vh-75">
<div class="container">
<div class="row">
<div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
<div class="card card-plain mt-8">
<div class="card-header pb-0 text-left bg-transparent">
<h3 class="font-weight-bolder text-info text-gradient">Register SISMA</h3>
<p class="mb-0">Masukan Email</p>
</div>
<div class="card-body">
<form method="post" action="{{ url('/register') }}">
            @csrf
    <label>Nama</label>
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
<label>Email</label>
<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
<label>Password</label>
<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
<label>Confirm Password</label>
            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

<div class="text-center">
<button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Daftar</button>
</div>
<p class="text-sm mt-3 mb-0">sudah punya akun? <a href="{{url('/login')}}" class="text-dark font-weight-bolder">Masuk</a></p>
</form>
</div>

</div>
</div>

</div>
</div>
</div>
</div>
</section>
</main>


<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>
</html>