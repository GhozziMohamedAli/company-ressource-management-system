<script>
    var msg = "<?php echo $msg ?>"
    const Toast = Swal.mixin(
    {
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
    })

        Toast.fire({
        icon: 'error',
        title: msg
    })
</script>
