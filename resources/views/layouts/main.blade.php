@include('layouts.partial.start')

    <!-- sidebar --> 
    @if (Auth::user()->role == 'Administrator')
      @include('layouts.partial.aside-admin')
    @elseif(Auth::user()->role == 'Verifikator')
      @include('layouts.partial.aside-verifikator')
    @elseif(Auth::user()->role == 'Validator')
      @include('layouts.partial.aside-validator')
    @elseif(Auth::user()->role == 'Member')
      @include('layouts.partial.aside-member')
    @endif
    <!-- end sidebar -->

    <div class="content ht-100v pd-0">
      <div class="content-header">
        <div class="content-search">
          <i data-feather="search"></i>
          <input type="search" class="form-control" placeholder="Search...">
        </div>
        {{-- <nav class="nav">
          <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
          <a href="" class="nav-link"><i data-feather="grid"></i></a>
          <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav> --}}
      </div><!-- content-header -->
      <div class="content-body">
        @yield('content')
      </div>
      
    </div><!-- content -->

    

@include('layouts.partial.end')

@stack('script')

</body>
</html>