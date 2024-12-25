@extends('layout.backend')
@section('content')
<h1>Category Lists</h1>
<a class="btn btn-primary" href="{{ url('/category/create') }}">New</a>
@if (count($categories) > 0)
<table class="table table-bordered">
<thead>
    <th>ID</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<tbody>
    @foreach ($categories as $category)
    <tr>
        <td>
            {!! $category->id !!}
        </td>
        <td>
        <a href="{{ url('/category/' . $category->id) }}">{!! $category->name !!}</a>
        </td>
        <td><a class="btn btn-primary" href="{!! url('/category/' . $category->id . '/edit') !!}">Edit</a></td>
        <td>
                {{ Html::form('DELETE','category/'. $category->id)->open()}}
                    <button class="btn btn-danger delete">Delete</button>
                {{ Html::form()->close() }}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endif
<!-- Include jQuery and jQuery UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        $(".delete").click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            $('<div></div>').appendTo('body')
                .html('<div><h6>Are you sure you want to delete this category?</h6></div>')
                .dialog({
                    modal: true,
                    title: 'Delete Category',
                    zIndex: 10000,
                    autoOpen: true,
                    width: 'auto',
                    resizable: false,
                    buttons: {
                        Yes: function() {
                            $(this).dialog('close');
                            $.ajax({
                                url: form.attr('action'),
                                type: 'DELETE',
                                data: form.serialize(),
                                success: function(response) {
                                    if(response.success) {
                                        location.reload();
                                    } else {
                                        alert(response.error);
                                    }
                                },
                                error: function(response) {
                                    alert('An error occurred while deleting the category.');
                                }
                            });
                        },
                        No: function() {
                            $(this).dialog("close");
                        }
                    },
                    close: function(event, ui) {
                        $(this).remove();
                    }
                });
        });
    });
</script>
@endsection
