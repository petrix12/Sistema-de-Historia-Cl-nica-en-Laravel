<script src="{{ asset('assets\plugins\jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets\backoffice\js\materialize.min.js') }}"></script>
<script src="{{ asset('assets\plugins\perfect-scrollbar\perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets\backoffice\js\plugins.js') }}"></script>
<script src="{{ asset('assets\backoffice\js\custom-script.js') }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
<script src="{{ asset('assets\swal\sweetalert2@10') }}"></script>
@include('sweetalert::alert')

@yield('foot')