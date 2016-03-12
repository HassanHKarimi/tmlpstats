<div class="panel panel-default message-center">
    <div class="panel-heading">Messages</div>
    <div class="panel-body">
        @foreach ($alerts as $alert)
            <?php
            $prefix = '';
            switch ($alert->type) {
                case 'error':
                    $class = 'danger';
                    break;
                case 'warning':
                    $class = 'warning';
                    break;
                case 'success':
                    $class = 'success';
                    break;
                case 'info':
                default:
                    $class = 'info';
                    break;
            }
            ?>
            <div class="alert alert-{{ $class }} alert-message" role="alert">
                @if ($alert->isDismissable())
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                @endif

                @if ($prefix)
                    <span class="message-prefix">{{ $prefix }}</span>
                @endif

                <span class="message">{{ $alert->message }}</span>
            </div>
        @endforeach
    </div>
</div>
