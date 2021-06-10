<?php

namespace Adminetic\Contact\Adapter;

use Pratiksh\Adminetic\Contracts\PluginInterface;
use Pratiksh\Adminetic\Traits\SidebarHelper;

class ContactAdapter implements PluginInterface
{
    use SidebarHelper;
    public function assets(): array
    {
        return  array();
    }

    public function myMenu(): array
    {
        return  array(
            [
                'type' => 'menu',
                'name' => 'Contacts',
                'icon' => 'fa fa-book',
                'is_active' => request()->routeIs('contact*') ? 'active' : '',
                'pill' => [
                    'class' => 'badge badge-info badge-air-info',
                    'value' => "Plugin",
                ],
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Contact::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Contact::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('contact', App\Models\Admin\Contact::class)
            ],
            [
                'type' => 'menu',
                'name' => 'Groups',
                'icon' => 'fa fa-users',
                'is_active' => request()->routeIs('group*') ? 'active' : '',
                'pill' => [
                    'class' => 'badge badge-info badge-air-info',
                    'value' => "Plugin",
                ],
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Group::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Group::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('group', App\Models\Admin\Group::class)
            ],
        );
    }

    public function headerComponents(): array
    {
        return [
            '<x-announcement-announcement-notification-bell />'
        ];
    }
}
