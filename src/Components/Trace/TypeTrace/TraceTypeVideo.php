<?php

namespace App\Components\Trace\TypeTrace;

class TraceTypeVideo extends AbstractTrace implements TraceInterface
{
    final public const LABEL = 'trace_video';
    final public const BADGE = 'bg-info';
    final public const ICON = 'fas fa-link';

    final public const TEMPLATE = 'Components/Trace/type/video.html.twig';

    public function display(): string
    {
        return 'Un message pour une trace video';
    }

}
