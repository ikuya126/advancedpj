<script type="text/javascript">
            @if (session('msg_success'))
                $(function () {
                    toastr.success('{{ session(',msg_success,') }}')});
            @endif
            @if (session('msg_danger'))
              $(function () {
                toastr.danger('{{ session(', msg_danger, ') }}')});
                        @endif
</script>