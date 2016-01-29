<?php
/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\Spoiler\Listener;

use Flarum\Event\ConfigureFormatter;
use Illuminate\Contracts\Events\Dispatcher;

class AddBBCode
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureFormatter::class, [$this, 'AddBBCode']);
    }

    /**
     * @param ConfigureFormatter $event
     */
    public function AddBBCode(ConfigureFormatter $event)
    {
        // $event->configurator->BBCodes->addFromRepository('SPOILER');

        $event->configurator->BBCodes->addCustom(
            '[SPOILER title={TEXT1;optional}]{TEXT2}[/SPOILER]',
            '<div class="spoiler"><div class="title" role="button" onclick="parentNode.classList.toggle(\'open\');">{TEXT1}</div><div class="content">{TEXT2}</div></div>'
        );
    }
}