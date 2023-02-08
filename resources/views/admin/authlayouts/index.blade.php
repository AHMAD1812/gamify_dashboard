<!DOCTYPE html>
<html lang="en">
	
    @include('admin.authlayouts.header')

    <body>

        <div id="main-wrapper">
		
		
			<div class="clearfix"></div>
			
            @yield('content')
			<!-- ============================ Call To Action End ================================== -->
			
			<!-- ============================ Footer Start ================================== -->
	
			<!-- ============================ Footer End ================================== -->
			
			
			

		</div>
        
        @include('admin.authlayouts.script')
        
	</body>
</html>