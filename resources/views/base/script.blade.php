<script type="module">
    $(document).ready(() => {
        new DataTable('#table');
        @if (Session::has('message') && Session::get('alert-class') == 'success')
            Swal.fire({
                title: "Success",
                text: "{{ Session::get('message') }}",
                icon: "success",
            });
        @elseif(Session::has('message') && Session::get('alert-class') == 'failed')
            Swal.fire({
                title: "Failed",
                text: "{{ Session::get('message') }}",
                icon: "error",
            });
        @elseif($errors->any())
            Swal.fire({
                title: "Error",
                text: "{{ implode('\n', $errors->all()) }}",
                icon: "error",
            });
        @endif
    });
</script>