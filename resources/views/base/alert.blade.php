<script type="module">
    $(document).ready(() => {
        @if (Session::has('message') && Session::get('alert-class') == 'success')
            Swal.fire({
                title: "Success",
                text: "{{ Session::get('message') }}",
                icon: "success",
            });
        @elseif(Session::has('message') && Session::get('alert-class') == 'failed')
            Swal.fire({
                title: "Error",
                text: "{{ Session::get('message') }}",
                icon: "error",
            });
        @endif
    });
</script>