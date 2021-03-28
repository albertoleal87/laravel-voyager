<?php

namespace TCG\Voyager\Actions;

class RestoreAction extends AbstractAction
{
    public function getTitle()
    {
        #return __('voyager::generic.restore');
    }

    public function getIcon()
    {
        return 'voyager-refresh';
    }

    public function getPolicy()
    {
        return 'restore';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-default btn-success restore',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'restore-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.restore', $this->data->{$this->data->getKeyName()});
    }
}
