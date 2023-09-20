@if (session('success'))
<script>
    Swal.fire(
        'Exito!',
        '{{ session('success') }}',
        'success'
    )
</script>
@elseif (session('error'))
<script>
    Swal.fire(
        '¡Error!',
        '{{ session('error') }}',
        'error'
    )
</script>
@endif
