@if (empty($message) || $message->count() == 0)

@else
    <div class="flash-message-container">
        <div class="flash-message">
            <ul class="flash-message__list responsive">
                @foreach ($message as $message_items)
                    @if ($message_items->status == 'En ligne')
                        <li class="flash-message__item">
                            <strong
                                style="text-transform: capitalize; font-weight: 500;font-size: 13px;
                            color: black; background-color: #ff6902;border-radius: 5px 5px;">
                                Flash infos:</strong>
                            @if ($message_items->liens == 'null')
                                <a href="#"
                                    style="font-weight: 500;
                                    color: black;
                                    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                                    {{ $message_items->infosflash }}
                                </a>
                            @else
                                <a href="{{ $message_items->liens }}"
                                    style="font-weight: 500;
                        color: black;
                        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                                    {{ $message_items->infosflash }}
                                </a>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif
