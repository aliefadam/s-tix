<script type="module">
    const toast = @json($message);
    const type = "{{ $type }}";

    for (let i = 0; i < toast.length; i++) {
        Toastify({
            text: toast[i],
            duration: 5000,
            gravity: "bottom",
            stopOnFocus: true,
            className: `animate__animated animate__fadeInDown text-sm bg-gradient-to-r ${type == "success" ? "from-green-600 to-green-700" : "from-red-600 to-red-700"} absolute z-20 right-5 h-[30px] flex gap-3 justify-center items-center px-5 py-6 text-white rounded-md`,
            close: true,
            callback: function() {
                $(this)
                    .removeClass("animate__fadeInDown")
                    .addClass("animate__fadeOutUp");
            },
        }).showToast();
    }

    $.each($(".toastify").get(), function(indexInArray, valueOfElement) {
        valueOfElement.setAttribute(
            "style",
            `transform: translate(0px, -10px); bottom: ${
            (indexInArray + 0.3) * 60
        }px;`
        );
    });
</script>
