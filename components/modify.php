<script>
    function enableInput(inputId) {
        const input = document.getElementById(inputId);
        if (input) {
            input.disabled = false;
            input.focus();
            input.addEventListener('blur', () => {
                input.disabled = true;
            }, {
                once: true
            });
        }
    }
</script>