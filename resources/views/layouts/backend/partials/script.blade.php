<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>

<!-- Select2 Js -->
<script src="{{ asset('assets/admin/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>

<!-- dropify file-upload Js -->
<script src="{{ asset('assets/admin/libs/dropify/dropify.min.js') }}"></script>

{{-- DataTables  --}}
<script src="{{ asset('assets/admin/js//datatables.js') }}"></script>
<script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('assets/admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vfs_fonts.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>




<!-- Sweet Alerts js -->
<script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/sweet-alerts.init.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/js/sweetalert2@11.js') }}"></script> --}}
{{-- <script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.sa-delete').forEach(function(button) {

        button.addEventListener('click', function () {

            let id = this.getAttribute('data-id');
            let link = this.getAttribute('data-link');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link + id;
                }
            });

        });

    });

});
</script> --}}
