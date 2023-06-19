
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    window.CSRF_TOKEN = '{{ csrf_token() }}';
    window.ID_USER = '{{ auth()->user()->id }}';
</script>
<script type="module" src="{{url::asset('js/main.js')}}"></script>