<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<tr>
    <td>
        <div class="media alert {{ $class }}">
            <h5 class="media-heading">
                <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
                ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
            </h5>
        </div>
    </td>
    <td>
        <p>Created by: {{ $thread->creator()->name }}</p>
    </td>
</tr>

