<?php

namespace App\Observers;

use App\Models\Employer;
use Carbon\Carbon;

class EmployerObserver
{
    /**
     * Handle the ModelsEmployer "created" event.
     *
     * @param  \App\Models\Employer  $panelEmployer
     * @return void
     */
    public function created(Employer $panelEmployer)
    {
        //
    }

    /**
     * Handle the ModelsEmployer "updated" event.
     *
     * @param  \App\Models\Employer  $blogCategory
     * @return void
     */
    public function updated(Employer $blogCategory)
    {
        //
    }

    public function updating(Employer $blogCategory){
        $this->setSlug($blogCategory);
    }

    /**
     * Handle the ModelsEmployer "deleted" event.
     *
     * @param  \App\Models\Employer  $panelEmployer
     * @return void
     */
    public function deleted(Employer $panelEmployer)
    {
        //
    }

    /**
     * Handle the ModelsEmployer "restored" event.
     *
     * @param  \App\Models\Employer  $blogCategory
     * @return void
     */
    public function restored(Employer $blogCategory)
    {
        //
    }

    /**
     * Handle the ModelsEmployer "force deleted" event.
     *
     * @param  \App\Models\Employer  $blogCategory
     * @return void
     */
    public function forceDeleted(Employer $blogCategory)
    {
        //
    }

    protected function setPublishedAt(Employer $blogCategory){
        if(empty($blogCategory->published_at) && $blogCategory->is_published ){
            $blogCategory->published_at = Carbon::now();
        }
    }

    protected function setSlug(Employer $blogCategory){
        if(empty($blogCategory->slug)){
            $blogCategory->slug = \Str::slug($blogCategory->title);
        }
    }
}
