<!DOCTYPE html>
<html lang="en">
	
    @include('admin.auth.header')

    <body>

        <div id="main-wrapper">
		
		
			<div class="clearfix"></div>
			
            @yield('content')
			
		</div>
        
        @include('admin.auth.script')
        
	</body>
</html>