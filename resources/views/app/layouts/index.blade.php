<!DOCTYPE html>
<html lang="en">
	
    @include('app.layouts.header')

    <body>

        <div id="main-wrapper">
		
			@include('app.layouts.navbar')
			<!-- End Navigation -->
			<div class="clearfix"></div>
			
            @yield('content')
			<!-- ============================ Call To Action End ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
			@include('app.layouts.footer')
			<!-- ============================ Footer End ================================== -->
			
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
        
        @include('app.layouts.script')
        
	</body>
</html>