<script type="module">
    const {
        title,
        text,
        icon
    } = @json($notification);
    Swal.fire({
        title,
        text,
        icon,
    });
</script>
