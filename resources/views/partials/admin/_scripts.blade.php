        <!-- jQuery  -->
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/js/detect.js') }}"></script>
        <script src="{{ asset('admin/js/fastclick.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('admin/js/waves.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>

        <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.js') }}"></script>

        <script src="{{ asset('admin/plugins/tiny-editable/mindmup-editabletable.js') }}"></script>
        <script src="{{ asset('admin/plugins/tiny-editable/numeric-input-example.js') }}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/raphael/raphael-min.js') }}"></script>

        <!-- Dashb~oard init -->
        <script src="{{ asset('admin/pages/jquery.dashboard.js') }}"></script>

        <!-- Modal-Effect -->
        <script src="{{ asset('admin/plugins/custombox/dist/custombox.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/custombox/dist/legacy.min.js') }}"></script>

        <!--form wysiwig js-->
        <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>

        <!-- file uploads js -->
        <script src="{{ asset('admin/plugins/fileuploads/js/dropify.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.app.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                if ($("#elm1").length > 0) {
                    tinymce.init({
                        selector: "textarea#elm1",
                        theme: "modern",
                        height: 300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [{
                                title: 'Bold text',
                                inline: 'b'
                            },
                            {
                                title: 'Red text',
                                inline: 'span',
                                styles: {
                                    color: '#ff0000'
                                }
                            },
                            {
                                title: 'Red header',
                                block: 'h1',
                                styles: {
                                    color: '#ff0000'
                                }
                            },
                            {
                                title: 'Example 1',
                                inline: 'span',
                                classes: 'example1'
                            },
                            {
                                title: 'Example 2',
                                inline: 'span',
                                classes: 'example2'
                            },
                            {
                                title: 'Table styles'
                            },
                            {
                                title: 'Table row 1',
                                selector: 'tr',
                                classes: 'tablerow1'
                            }
                        ]
                    });
                }
            });
        </script>

        <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'برای آپلود بکشید و رها کنید یا کلیک کنید',
                    'replace': 'برای تعویض بکشید و رها کنید یا کلیک کنید',
                    'remove': 'حذف',
                    'error': '!!!اشتباهی رخ داده'
                },
                error: {
                    'fileSize': '(1mb حد مجاز)سایز فایل بیش از حد مجاز است'
                }
            });
        </script>

        <!-- Table js -->
        {{-- <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script> --}}
