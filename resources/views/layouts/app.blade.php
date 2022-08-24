
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }}</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    @vite(['resources/css/app.css'])

    {{-- <link rel="stylesheet" href="{{ asset('./assets/css/tailwind.output.css') }}" /> --}}
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('./assets/js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{ asset('./assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('./assets/js/charts-pie.js') }}" defer></script>
  </head>
  <body>
    <div
      class="flex  bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- sidebar -->
      @include('layouts.sidebar')
      <!-- / sidebar -->
      
      <!-- Backdrop -->
      
      <div class="flex flex-col flex-1 w-full">
        
        {{-- Header --}}
        @include('layouts.header')        
        {{-- /Header --}}

        {{-- Content --}}
        <main class="h-full ">
          {{ $slot }}
        </main>
        {{-- / Content --}}
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('script')
  </body>
</html>
