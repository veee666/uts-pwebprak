<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="/css/dashboard.css" rel="stylesheet">
    <style>
        .navbar-custom{
            background-color: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(5px);
        }
        
    </style>
  </head>
  <body>
    
@include('component.dashboard.navbar')

{{-- SIDEBAR --}}
<div class="container-fluid">
  <div class="row">
    @include('component.dashboard.sidebar')
@yield('dash-content')
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
  </body>
</html>
