@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <h1>Submit a link</h1>
            <form action="store" method="post" id="submit-form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title_add" name="title" placeholder="Title">
                    <small>Min: 2, Max: 32, only text</small>
                    <p class="errorTitle text-center alert alert-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(
            function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#submit-form').on(
                    {
                        submit:
                            function()
                            {
                                $.ajax({
                                    type: 'POST',
                                    url: '/links',
                                    data: {
                                        'title': $('#title_add').val(),
                                    },
                                    success: function (data) {
                                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                                    },
                                    error: function (xhr) {
                                        for(i in xhr.responseJSON)
                                        {

                                            toastr.error(xhr.responseJSON[i][0], 'Error Alert', {timeOut: 5000});

                                        }

                                    },
                                });

                                return false;
                            }
                    }
                );

                function error(key)
                {

                }
            }

        );
    </script>
@endsection
