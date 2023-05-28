<!DOCTYPE html>
<html lang="en">
	
    @include('admin.layouts.header')

    <body>

        <div id="main-wrapper">
		
			@include('admin.layouts.navbar')
			<!-- End Navigation -->

			@include('admin.layouts.sidebar')
			<div class="clearfix"></div>
			
            @yield('content')
			<!-- ============================ Call To Action End ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
			@include('admin.layouts.footer')
			<!-- ============================ Footer End ================================== -->
		

		</div>
        
        @include('admin.layouts.script')
        
	</body>
</html>