@if(session('message'))
	<script>
	$(document).ready(function(){
		swal('Success',"{{ session('message') }}",'success');
	});
</script>
@endif