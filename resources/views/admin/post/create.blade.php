
@extends('admin.master')

@section('content')



<div class="container firm-border shadow mt-3">

        <div class="card-header">
            <h4 class="">New article</h4>
        </div>


        <form role="form" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="col-sm-8"><br><label style="color:blue;"><input type="checkbox" name="visible" value="1"> Visible</label></div>

            <div class="card-body">
                <div class="form-group row">

                    <label class="col-sm-1 col-form-label">Title</label>
                    <div class="col-sm-11"><input type="text" name="title" class="form-control @error('title') is-invalid @enderror"></div>

                </div>

                <div class="form-group">
                    <label  for="content">Article</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" placeholder="Enter ..."></textarea>
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

</div>


@endsection
@section('scripts')

    <script src="{{asset('assets/admin/tinymce/tinymce.min.js')}}"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                // language: 'en',
                mode: 'exact',
                selector: '#content',
                height: 400,
                gecko_spellcheck: true,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern media imagetools"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | forecolor backcolor emoticons | " +
                    "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | " +
                    "formatselect fontsizeselect | code media emoticons ",
                image_advtab: true,
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                images_reuse_filename: true,
                imagetools_toolbar: 'editimage imageoptions',
                images_upload_handler: function (file, success, fail) {

                    // let formdata = new FormData
                    //
                    // formdata.append('file', file.blob(), file.filename().value)

                    {{--$.ajax({--}}
                    {{--    url: '{{route('post.store')}}',--}}
                    {{--    method: 'post',--}}
                    {{--    dataType: 'json',--}}
                    {{--    data: formdata,--}}
                    {{--    success: function(data){--}}
                    {{--        console.log(data);--}}
                    {{--    }--}}
                    {{--});--}}

                },
                file_picker_callback: function (callback, value, meta) {

                    let input = document.createElement('input')

                    input.setAttribute('type', 'file')

                    input.setAttribute('accept', 'image/*')

                    input.click()

                    input.onchange = function () {

                        let reader = new FileReader

                        reader.readAsDataURL(this.files[0])

                        reader.onload = () => {

                            let blobCache = tinymce.activeEditor.editorUpload.blobCache

                            let base64 = reader.result.split(',')[1]

                            let blobInfo = blobCache.create(this.files[0].name, this.files[0], base64)

                            blobCache.add(blobInfo)

                            callback(blobInfo.blobUri(), {title: this.files[0].name} )
                        }
                    }
                }
            })
        });

    </script>


@endsection

