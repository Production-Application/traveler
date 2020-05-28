@extends('back_end.layouts.app')

@section('title','Create Package')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('package') }}" method="post">
                    @csrf

                    {{-- Errors Showing Section --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @if($errors->count() == 1)
                                {{ $errors }}
                            @else
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif

                    {{-- Action Success or Failed Section--}}
                    @if(session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    {{-- Main Input section Started --}}
                    <div class="form-row">
                        {{-- Left Side Panel --}}
                        <div class="col-7">
                            <div class="card">
                                <div class="card-header">Package General Information</div>
                                <div class="card-body">
                                    <div class="form-row mb-3">
                                        <label for="package">Select a category</label>
                                        <select name="category_id" class="form-control form-control-sm" id="package">
                                            <option value="">-- Please select a category --</option>
                                            @foreach($categories as $index=>$category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-row mb-3">--}}
{{--                                        <label for="package">Select a sub category</label>--}}
{{--                                        <select name="sub_category_id" class="form-control form-control-sm" id="package">--}}
{{--                                            <option value="">-- Please select a sub category --</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="form-row mb-3">
                                        <label for="package">Package Title</label>
                                        <input type="text" name="package_title"
                                               class="form-control form-control-sm" id="package"
                                               value="{{ old('package_name') }}"
                                               placeholder="Coxsbazar is world's longest sea beach"
                                        />
                                    </div>
                                    <div class="form-row mb-3">
                                        <label for="package">Package Sub Title</label>
                                        <input type="text" name="package_sub_title"
                                               class="form-control form-control-sm" id="package"
                                               value="{{ old('package_name') }}"
                                               placeholder="120 km longest sea beach is consist with verities eco system"
                                        />
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label for="package">Tour Attractions</label>
                                            <input type="text" name="package_attraction"
                                                   class="form-control form-control-sm" id="package"
                                                   value="{{ old('package_attraction') }}"
                                                   placeholder="Chottogram,Bandarban,Khagrasori,Rangamati"
                                            />
                                        </div>
                                        <div class="col">
                                            <label for="package">Best Time</label>
                                            <input type="text" name="package_best_time"
                                                   class="form-control form-control-sm" id="package"
                                                   value="{{ old('package_best_time') }}"
                                                   placeholder="January - april"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label for="packageDes">Package Description</label>
                                            <texarea name="package_des" id="packageDes"></texarea>
{{--                                            <div id="packageDes"></div>--}}
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label for="package">Select Package Images</label>
                                            <input type="file" name="package_img[]"
                                                   class="dropify" data-show-errors="true" multiple
                                            />
                                        </div>
                                    </div>
                                </div>
{{--                                Card Body End point --}}
                            </div>
                        </div>

                        {{-- Right Side Panel--}}
                        <div class="col">
                            <div class="card">
                                <div class="card-header">Package Additional Information</div>
                                <div class="card-body">


                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label for="package">Package Duration</label>
                                            <input type="text" name="package_duration"
                                                   class="form-control form-control-sm" id="package"
                                                   value="{{ old('package_duration') }}"
                                                   placeholder="10 days / 11 nights"
                                            >
                                        </div>
                                        <div class="col">
                                            <label for="package">Package Duration</label>
                                            <input type="text" name="package_duration"
                                                   class="form-control form-control-sm" id="package"
                                                   value="{{ old('package_duration') }}"
                                                   placeholder="10 days / 11 nights"
                                            >
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <input type="submit" class="btn btn-success " value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Main Input section End --}}
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#packageDes' ), {

                removePlugins: ['restrictedEditing'],
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        'codeBlock',
                        'fontSize',
                        'fontColor',
                        'fontBackgroundColor',
                        'fontFamily',
                        'highlight',
                        'pageBreak',
                        'removeFormat',

                        'subscript',
                        'superscript',
                        'strikethrough',
                        'todoList',
                        'underline',
                        'CKFinder',
                        'alignment',
                        'horizontalLine'
                    ]
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
            } )
            .then( packageDes => {
                window.editor = packageDes;
            } )
            .catch( error => {
                console.error( 'Oops, something gone wrong!' );
            } );
    </script>

{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: '#packageDes',--}}
{{--            branding: false,--}}
{{--            skin: 'oxide-dark',--}}
{{--            content_css: 'dark',--}}
{{--            height: 280,--}}
{{--            plugins: [--}}
{{--                "advlist autolink lists link image charmap print preview hr anchor pagebreak",--}}
{{--                "searchreplace wordcount visualblocks visualchars code fullscreen",--}}
{{--                "insertdatetime media nonbreaking save table contextmenu directionality",--}}
{{--                "emoticons template paste textcolor colorpicker textpattern"--}}
{{--            ],--}}
{{--            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",--}}
{{--            /* enable title field in the Image dialog*/--}}
{{--            image_title: true,--}}
{{--            /* enable automatic uploads of images represented by blob or data URIs*/--}}
{{--            automatic_uploads: true,--}}
{{--            /*--}}
{{--              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)--}}
{{--              images_upload_url: 'postAcceptor.php',--}}
{{--              here we add custom filepicker only to Image dialog--}}
{{--            */--}}
{{--            file_picker_types: 'image',--}}
{{--            /* and here's our custom image picker*/--}}
{{--            file_picker_callback: function (cb, value, meta) {--}}
{{--                var input = document.createElement('input');--}}
{{--                input.setAttribute('type', 'file');--}}
{{--                input.setAttribute('accept', 'image/*');--}}

{{--                /*--}}
{{--                  Note: In modern browsers input[type="file"] is functional without--}}
{{--                  even adding it to the DOM, but that might not be the case in some older--}}
{{--                  or quirky browsers like IE, so you might want to add it to the DOM--}}
{{--                  just in case, and visually hide it. And do not forget do remove it--}}
{{--                  once you do not need it anymore.--}}
{{--                */--}}

{{--                input.onchange = function () {--}}
{{--                    var file = this.files[0];--}}

{{--                    var reader = new FileReader();--}}
{{--                    reader.onload = function () {--}}
{{--                        /*--}}
{{--                          Note: Now we need to register the blob in TinyMCEs image blob--}}
{{--                          registry. In the next release this part hopefully won't be--}}
{{--                          necessary, as we are looking to handle it internally.--}}
{{--                        */--}}
{{--                        var id = 'blobid' + (new Date()).getTime();--}}
{{--                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;--}}
{{--                        var base64 = reader.result.split(',')[1];--}}
{{--                        var blobInfo = blobCache.create(id, file, base64);--}}
{{--                        blobCache.add(blobInfo);--}}

{{--                        /* call the callback and populate the Title field with the file name */--}}
{{--                        cb(blobInfo.blobUri(), { title: file.name });--}}
{{--                    };--}}
{{--                    reader.readAsDataURL(file);--}}
{{--                };--}}

{{--                input.click();--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endpush
