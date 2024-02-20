@extends('layouts.admin.index');

@section('header')
    @include('layouts.admin.header');
@endsection

@section('toolbar')
    @include('layouts.admin.toolbar');
@endsection

@section('container')
    <div class="container bg-white shadow-light p-5" style="border-radius: 20px">
        <div class="row">
            <div class="col p-5">
                <form id="form-diary" class="form p-5" method="POST" action="{{route('admin.diaries.store')}}">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Edição</label>
                                <input type="number" step="1" name="edition" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Ex: 3407" />
                            </div>
                            <div class="col-lg-3">
                                <label class="required fw-bold fs-6 mb-2">Publicada em</label>
                                <input class="form-control  ps-12 flatpickr-input" placeholder="Selecione a data" id="published_at" name="published_at" type="text" readonly="readonly">
                            </div>
                        </div>
                        <div class="row mt-4 fw-bold fs-6 mb-2">
                            <div class="col-lg-12">
                                <label class="required">Corpo do Diário </label>
                                <div id="editor" name='content' ></div>
                            </div>
                        </div>
                    </div>


                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" onclick="window.location.href='{{route('management.diaries.view-list')}}'">Voltar</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Publicar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!--begin::Page Custom Javascript(used by this page)-->
    <script>
        let urlDiariesDatatable = "{{ route('admin.diaries.list') }}";
        let urlDiariesDelete = "{{ route('admin.diaries.delete', ['diary' => 'id']) }}";
        let diariesDatatable = null;
        let classicEditor = null;
        let hasSaved = '{{isset($saved)}}';

        $("#form-diary").submit(function(e) {
            e.preventDefault();

            $("<input />").attr("type", "hidden")
                .attr("name", "content")
                .attr("value", classicEditor.getData())
                .appendTo("#form-diary");

            e.target.submit();
        })

        $(document).ready(function() {

            $('#published_at').flatpickr({enableTime:!1,dateFormat:"d/m/Y"})

            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    classicEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });

            
        })

        function excluir(id) {
            Swal.fire({
                title: 'Tem certeza que deseja excluir o diário?',
                showDenyButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: 'Não',
            }).then((result) => {
                if (result.isConfirmed) {
                    ajaxExcluirDiario(id)
                }
            })
        }

        function ajaxExcluirDiario(id) {

            urlDiariesDelete = urlDiariesDelete.replace('id', id)

            axios({
                method: 'get',
                url: urlDiariesDelete,
            }).then((response) => {

                if (response.data.status == 'error') {

                    Swal.fire({
                        text: response.data.message,
                        icon: response.data.status,
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })

                } else {

                    diariesDatatable.ajax.reload();

                    Swal.fire({
                        text: "Diário removido com sucesso!",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }
            })

        }
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
@endpush

@section('footer')
    @include('layouts.admin.footer');
@endsection
