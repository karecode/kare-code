@extends('backend.layouts.app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-lg-10">
            <h2>Text Editor</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/bloglar">Blog</a>
                </li>
                <li class="active">
                    <strong>Blog Ekle</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content">


        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Wyswig Summernote Editor</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <form class="form-horizontal" name="blogForm"  id="blogForm" method="post" action="blog-ekle"
                              enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">Başlık</label>

                                <div class="col-sm-11"><input required name="baslik" id="baslik" type="text"
                                                              class="form-control"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <textarea class="ckeditor" name="icerik"></textarea>
                            <div class="hr-line-dashed"></div>
                            <input type="file" name="image" id="image">
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="reset">İptal</button>
                                    <button class="btn btn-primary" type="submit">Kaydet</button>
                                </div>
                            </div>

                            <div id="progress">
                                <div id="bar"></div>
                                <div id="yuzde">0%</div >
                            </div>
                            <br/>

                            <div id="mesaj"></div>
                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('css')
    {{--<link href="{{asset('backend/')}}/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="{{asset('backend/')}}/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">--}}
@stop

@section('js')
    <!-- Custom and plugin javascript -->
    <script src="{{asset('backend/')}}/js/inspinia.js"></script>
    <script src="{{asset('backend/')}}/js/plugins/pace/pace.min.js"></script>
    {{--<script src="{{asset('backend/')}}/js/plugins/summernote/summernote.min.js"></script>--}}
    <script src="{{asset('/')}}/js/ckeditor/ckeditor.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script>
        function Kaydet() {
            var content = $('.summernote').code();
            var data = {'icerik': content, 'sayfano': sayfaSayisi, 'slug': slug};
            $.ajax({
                url: 'blog-kaydet',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (cevap) {
                    returnSuccess(cevap);
                },
                error: function (cevap) {
                    returnError(cevap);
                }
            });
        }

        $(function () {
            $("#blogForm").ajaxForm({

                beforeSend: function () {

                    $("#progress").show();
                    /*clear everything*/
                    $("#bar").width('0%');
                    $("#mesaj").html("");
                    $("#yuzde").html("0%");
                },
                uploadProgress: function (event, position, total, percentComplete) {

                    $("#bar").width(percentComplete + '%');
                    $("#yuzde").html(percentComplete + '%');
                },
                success: function () {

                    $("#bar").width('100%');
                    $("#yuzde").html('100%');
                },
                complete: function (cevap) {
                    returnSuccess(cevap.responseText);
                    swal(
                            cevap.responseText.baslik,
                            cevap.responseText.msg,
                            'success'
                    );
                    alert(cevap.responseText);
                },
                error: function (response) {
                    /*returnError(response);*/
                }
            });
            CKEDITOR.replace('icerik', {
                filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}'

            });

            /*
             *Aşağıdaki Kodlar WSYING Editör için Geçerlidir.
             /*
             $('.summernote').summernote({
             onImageUpload: function (files, editor, $editable) {
             sendFile(files[0], editor, $editable);
             }
             });
             function sendFile(file, editor, welEditable) {
             data = new FormData();
             data.append("file", file);
             $.ajax({
             url: "blog/resim-upload",
             data: data,
             cache: false,
             contentType: false,
             processData: false,
             type: 'POST',
             success: function (data) {
             $('.summernote').summernote("insertImage", data.msg, 'filename');
             },
             error: function (jqXHR, textStatus, errorThrown) {
             console.log(textStatus + " " + errorThrown);
             console.log(jqXHR.responseJSON.msg);
             returnError(jqXHR.responseJSON);
             }
             });
             }*/
        });


    </script>
@stop