@extends('template')

@section('content')
    <h2>Alert Messages</h2>
    <a href="{{ url('/alerts/create') }}">+ Add one</a>
    <br/><br/>

    <div id="messages" class="alert alert-danger" role="alert" style="display:none">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <span class="message-prefix" style="font-weight:bold">Error: </span>
        <span class="message"></span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover want-datatable">
            <thead>
            <tr>
                <th>Importance</th>
                <th>Message</th>
                <th>Active</th>
                <th>Display Starting At</th>
                <th>Expires At</th>
                <th>Created By</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($invites as $invite)
                <tr id="{{ $invite->id }}">
                    <td><a href="{{ url("/alerts/{$invite->id}") }}">{{ $invite->firstName }} {{ $invite->lastName }}</a></td>
                    <td>{{ $invite->email }}</td>
                    <td>{{ $invite->role ? $invite->role->display : '' }}</td>
                    <td>{{ $invite->center ? $invite->center->name : '' }}</td>
                    <td><a href="{{ url("/alerts/{$invite->id}/edit") }}">Edit</a></td>
                    <td>
                        <a href="#" class="delete" title="Delete" style="color: black">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $("a.delete").click(function() {
            var id = $(this).closest('tr').attr('id');
            $.ajax({
                type: "DELETE",
                url: "/alerts/" + id,
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
                },
                success: function(response) {
                    var $messages = $("#messages");
                    var removeClass = "alert-success";
                    var addClass = "alert-danger";
                    var messagePrefix = "Error: ";

                    if (response.success) {
                        removeClass = "alert-danger";
                        addClass = "alert-success";
                        messagePrefix = "Success! ";
                    }

                    $messages.removeClass(removeClass);
                    $messages.addClass(addClass);
                    $messages.find("span.message-prefix").text(messagePrefix);
                    $messages.find("span.message").text(response.message);
                    $messages.show();

                    if (response.success) {
                        $("#" + response.invite).remove();
                    }
                }
            });
        });
    </script>
@endsection