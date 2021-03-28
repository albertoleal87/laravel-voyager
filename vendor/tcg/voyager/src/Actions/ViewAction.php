<?php

namespace TCG\Voyager\Actions;

class ViewAction extends AbstractAction
{
    public function getTitle()
    {
        #return __('voyager::generic.view');
    }

    public function getIcon()
    {
        return 'voyager-search';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-default view view_info',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
    }
}
