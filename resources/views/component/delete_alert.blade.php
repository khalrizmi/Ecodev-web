<script>
    $(document).ready(function(){
        $('.btnDelete').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Are You Sure?",
                text: "Data Will delete permanently", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location.href = href;
              }
            });
        });
    });
</script>